<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;

class CookieSD
{
    public static function getProductData(): array
    {
        $cookieValue = Request::cookie('product_data');
        $productData = json_decode($cookieValue, true) ?? [];

        // Filter out invalid or non-numeric entries
        $productData = array_filter($productData, function ($item) {
            return is_array($item) && isset($item['id']) && isset($item['quantity']) && is_numeric($item['id']) && is_numeric($item['quantity']);
        });

        return array_values($productData); // Reset array keys
    }

    public static function addToCookie(int $productId, int $quantity): void
    {
        $productData = self::getProductData();

        // Check if the product ID already exists in the array
        $existingProductIndex = array_search($productId, array_column($productData, 'id'));

        if ($existingProductIndex !== false) {
            // If the product already exists, update its quantity
            $productData[$existingProductIndex]['quantity'] += max(1, $quantity); // Ensure the quantity is at least 1
        } else {
            // If the product does not exist, add it to the array
            $productData[] = ['id' => $productId, 'quantity' => max(1, $quantity)];
        }

        $encodedProductData = json_encode(array_values($productData)); // Reset array keys
        Cookie::queue(Cookie::forever('product_data', $encodedProductData));
    }

    public static function removeFromCookie(int $productId): void
    {
        $productData = self::getProductData();

        // Filter out the product with the specified ID
        $updatedProductData = array_filter($productData, function ($item) use ($productId) {
            return $item['id'] !== $productId;
        });

        // Update the cookie with the modified product data
        $encodedProductData = json_encode(array_values($updatedProductData)); // Reset array keys
        Cookie::queue(Cookie::forever('product_data', $encodedProductData));
    }


    public static function data()
    {
        $cookie = self::getProductData();

        if (!empty($cookie)) {
            $productIds = array_column($cookie, 'id'); // Extract product IDs from the $cookie array

            // Check if there are valid product IDs in the cookie
            if (!empty($productIds)) {
                $data = Product::query();

                $products = $data->whereIn('id', $productIds)
                    ->where('stock_status', 1)
                    ->get();

                // Combine product data with quantities
                $productsWithData = collect($cookie)->map(function ($cookieItem) use ($products) {
                    $product = $products->where('id', $cookieItem['id'])->first();
                    $quantity = max(1, $cookieItem['quantity']);

                    if ($product) {
                        $product->quantity = $quantity;
                        $product->totalPrice = $product->finalPrice * $quantity; // Calculate total price for each product
                        return $product;
                    }

                    return null; // Handle the case where the product is not found
                })->filter();

                $totalPrice = $productsWithData->sum('totalPrice');

                return [
                    'products' => $productsWithData,
                    'price'    => $totalPrice,
                    'total'    => $productsWithData->count(),
                ];
            }
        }

        return [
            'products' => [],
            'price'    => 0.00,
            'total'    => 0,
        ];
    }

    public static function decrement(int $productId): void
    {
        $productData = self::getProductData();

        // Find the index of the product in the array
        $existingProductIndex = array_search($productId, array_column($productData, 'id'));

        if ($existingProductIndex !== false) {
            // If the product exists, reduce its quantity
            $productData[$existingProductIndex]['quantity'] = max(1, $productData[$existingProductIndex]['quantity'] -1);

            // If the quantity becomes zero or negative, remove the product from the array
            if ($productData[$existingProductIndex]['quantity'] <= 0) {
                unset($productData[$existingProductIndex]);
            }

            // Update the cookie with the modified product data
            $encodedProductData = json_encode($productData);
            Cookie::queue(Cookie::forever('product_data', $encodedProductData));
        }
    }

    public static function increment(int $productId): void
    {
        $productData = self::getProductData();

        // Find the index of the product in the array
        $existingProductIndex = array_search($productId, array_column($productData, 'id'));

        if ($existingProductIndex !== false) {
            // If the product exists, reduce its quantity
            $productData[$existingProductIndex]['quantity'] = max(1, $productData[$existingProductIndex]['quantity'] +1);

            // If the quantity becomes zero or negative, remove the product from the array
            if ($productData[$existingProductIndex]['quantity'] <= 0) {
                unset($productData[$existingProductIndex]);
            }

            // Update the cookie with the modified product data
            $encodedProductData = json_encode($productData);
            Cookie::queue(Cookie::forever('product_data', $encodedProductData));
        }
    }
}

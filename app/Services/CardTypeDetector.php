<?php

namespace App\Services;

class CardTypeDetector
{
    /**
     * Detect card type from card number (first 6 digits - BIN)
     */
    public static function detectFromCardNumber(string $cardNumber): array
    {
        // Remove spaces and non-digits
        $cardNumber = preg_replace('/\D/', '', $cardNumber);
        
        if (strlen($cardNumber) < 6) {
            return [
                'type' => 'unknown',
                'brand' => 'Unknown',
                'icon' => '💳'
            ];
        }
        
        $bin = substr($cardNumber, 0, 6);
        $first4 = substr($cardNumber, 0, 4);
        $first2 = substr($cardNumber, 0, 2);
        $first1 = substr($cardNumber, 0, 1);
        
        // Visa: starts with 4
        if ($first1 === '4') {
            return [
                'type' => 'visa',
                'brand' => 'Visa',
                'icon' => '💳',
                'color' => 'text-blue-500',
                'bg' => 'bg-blue-100'
            ];
        }
        
        // Mastercard: 51-55, 2221-2720
        if (in_array($first2, ['51', '52', '53', '54', '55']) || 
            (intval($first4) >= 2221 && intval($first4) <= 2720)) {
            return [
                'type' => 'mastercard',
                'brand' => 'Mastercard',
                'icon' => '🔴',
                'color' => 'text-red-500',
                'bg' => 'bg-red-100'
            ];
        }
        
        // American Express: 34, 37
        if (in_array($first2, ['34', '37'])) {
            return [
                'type' => 'amex',
                'brand' => 'American Express',
                'icon' => '💎',
                'color' => 'text-green-500',
                'bg' => 'bg-green-100'
            ];
        }
        
        // Discover: 6011, 622126-622925, 644-649, 65
        if ($first4 === '6011' || $first2 === '65' ||
            (intval(substr($cardNumber, 0, 6)) >= 622126 && intval(substr($cardNumber, 0, 6)) <= 622925) ||
            (intval($first3 = substr($cardNumber, 0, 3)) >= 644 && intval($first3) <= 649)) {
            return [
                'type' => 'discover',
                'brand' => 'Discover',
                'icon' => '🔍',
                'color' => 'text-orange-500',
                'bg' => 'bg-orange-100'
            ];
        }
        
        // JCB: 35
        if ($first2 === '35') {
            return [
                'type' => 'jcb',
                'brand' => 'JCB',
                'icon' => '🏛️',
                'color' => 'text-purple-500',
                'bg' => 'bg-purple-100'
            ];
        }
        
        // Diners Club: 300-305, 36, 38
        if ((intval($first3) >= 300 && intval($first3) <= 305) || 
            in_array($first2, ['36', '38'])) {
            return [
                'type' => 'diners',
                'brand' => 'Diners Club',
                'icon' => '🍽️',
                'color' => 'text-gray-500',
                'bg' => 'bg-gray-100'
            ];
        }
        
        return [
            'type' => 'unknown',
            'brand' => 'Unknown',
            'icon' => '💳',
            'color' => 'text-gray-500',
            'bg' => 'bg-gray-100'
        ];
    }
    
    /**
     * Detect card type from payment gateway response (legacy)
     */
    public static function detectFromWebXPayGateway(string $paymentGateway): array
    {
        $gateway = strtolower($paymentGateway);
        
        $gatewayMap = [
            'visa' => [
                'type' => 'visa',
                'brand' => 'Visa',
                'icon' => '💳',
                'color' => 'text-blue-500',
                'bg' => 'bg-blue-100'
            ],
            'mastercard' => [
                'type' => 'mastercard',
                'brand' => 'Mastercard',
                'icon' => '🔴',
                'color' => 'text-red-500',
                'bg' => 'bg-red-100'
            ],
            'amex' => [
                'type' => 'amex',
                'brand' => 'American Express',
                'icon' => '💎',
                'color' => 'text-green-500',
                'bg' => 'bg-green-100'
            ],
            'discover' => [
                'type' => 'discover',
                'brand' => 'Discover',
                'icon' => '🔍',
                'color' => 'text-orange-500',
                'bg' => 'bg-orange-100'
            ],
            'jcb' => [
                'type' => 'jcb',
                'brand' => 'JCB',
                'icon' => '🏛️',
                'color' => 'text-purple-500',
                'bg' => 'bg-purple-100'
            ]
        ];
        
        if (isset($gatewayMap[$gateway])) {
            return $gatewayMap[$gateway];
        }
        
        foreach ($gatewayMap as $key => $data) {
            if (strpos($gateway, $key) !== false) {
                return $data;
            }
        }
        
        return [
            'type' => 'card',
            'brand' => 'Credit/Debit Card',
            'icon' => '💳',
            'color' => 'text-blue-500',
            'bg' => 'bg-blue-100',
            'gateway' => $paymentGateway
        ];
    }
    
    /**
     * Get card type from transaction metadata
     */
    public static function detectFromTransactionData(array $metadata, string $paymentMethod): array
    {
        // Legacy card gateway transactions
        if ($paymentMethod === 'webxpay' && isset($metadata['payment_gateway'])) {
            return self::detectFromWebXPayGateway($metadata['payment_gateway']);
        }
        
        if (in_array($paymentMethod, ['kokopay', 'tamara', 'tabby'])) {
            return [
                'type' => 'bnpl',
                'brand' => match ($paymentMethod) {
                    'tamara' => 'Tamara (Coming Soon)',
                    'tabby' => 'Tabby (Coming Soon)',
                    default => 'BNPL (Legacy)',
                },
                'icon' => '⏰',
                'color' => 'text-purple-500',
                'bg' => 'bg-purple-100'
            ];
        }
        
        // For Bank Transfer
        if ($paymentMethod === 'bank_transfer') {
            return [
                'type' => 'bank',
                'brand' => 'Bank Transfer',
                'icon' => '🏦',
                'color' => 'text-green-500',
                'bg' => 'bg-green-100'
            ];
        }
        
        return [
            'type' => 'unknown',
            'brand' => 'Unknown Payment Method',
            'icon' => '❓',
            'color' => 'text-gray-500',
            'bg' => 'bg-gray-100'
        ];
    }
}

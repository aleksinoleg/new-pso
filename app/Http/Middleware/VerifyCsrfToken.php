<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'checkUniqueEmail',
        'payment-success',
        'payment-failed',
        'paypal-payment',
        '/admin/addOneTo',
        '/admin/removeOneTo',
        '/admin/customer_register_shipping',
        '/admin/forget_pass_shipping',
        '/admin/customer_auth_shipping',
        'checkDiscount',
        'saveAnswer'
    ];
}

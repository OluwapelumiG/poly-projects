<?php

namespace App\Filament\General\Resources\PaymentResource\Pages;

use App\Filament\General\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}

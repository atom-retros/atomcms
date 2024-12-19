<?php

namespace App\Enums;

enum CurrencyTypes: int
{
    case Credits = -1;
    case Duckets = 0;
    case Diamonds = 5;
    case Points = 101;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function fromCurrencyName(string $currencyName): ?self
    {
        $currencyName = strtolower($currencyName);

        $currency = match ($currencyName) {
            'credits' => self::Credits,
            'duckets' => self::Duckets,
            'diamonds' => self::Diamonds,
            'points' => self::Points,
            default => null,
        };

        return $currency;
    }

    public function getImage(): string
    {
        return match ($this->value) {
            CurrencyTypes::Credits->value => asset('assets/images/currencies/credits.gif'),
            CurrencyTypes::Duckets->value => asset('assets/images/currencies/duckets.png'),
            CurrencyTypes::Diamonds->value => asset('assets/images/currencies/diamonds.png'),
            CurrencyTypes::Points->value => asset('assets/images/currencies/points.png'),
        };
    }

    public static function toInput(): array
    {
        $allCurrencies = self::cases();

        return array_combine(
            array_column($allCurrencies, 'value'),
            array_column($allCurrencies, 'name'),
        );
    }
}

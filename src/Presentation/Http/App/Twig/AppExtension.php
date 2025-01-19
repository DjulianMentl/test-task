<?php

namespace App\Presentation\Http\App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private const VIEW_LIMITS = [
        'fifty' => 50,
        'thousand' => 1000,
        'million' => 1000000,
        'billion' => 1000000000,
    ];
    public function getFunctions(): array
    {
        return [
            new TwigFunction('format_views', [$this, 'formatViews']),
        ];
    }

    public function formatViews(int $views): string
    {
        return match (true) {
            $views < self::VIEW_LIMITS['thousand'] => (string)(round($views / self::VIEW_LIMITS['fifty']) * self::VIEW_LIMITS['fifty']),
            $views < self::VIEW_LIMITS['million'] => round($views / self::VIEW_LIMITS['thousand'], 1) . 'K',
            $views < self::VIEW_LIMITS['billion'] => round($views / self::VIEW_LIMITS['million'], 1) . 'M',
            default => round($views / self::VIEW_LIMITS['billion'], 1) . 'B'
        };

    }
}

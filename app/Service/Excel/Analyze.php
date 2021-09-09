<?php

declare(strict_types=1);

namespace App\Service\Excel;


class Analyze
{

    public static function filter($items): array
    {
        return [
            'total_count' => $items->count(),
            'available_count' => $items->where('available', 1)->count(),
            'with_description_count' => $items->whereNotNull('description')->count(),
            'with_description_full_count' => $items->whereNotNull('description_full')->count(),
            'with_image_count' => $items->whereNotNull('images')->count(),
        ];
    }

}

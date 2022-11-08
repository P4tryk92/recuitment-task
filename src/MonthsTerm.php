<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview;

class MonthsTerm
{
    public const FEE_STRUCTURE = [];

    /**
     * @param $amount
     *
     * @return array
     */
    public function getLowerAndUpperBound($amount): array
    {
        $amounts = array_keys(static::FEE_STRUCTURE);
        $closest = self::_getClosest($amount, $amounts);
        $closestKey = array_search($closest, $amounts);

        if ($closest < $amount) {
            $lowerBound = $closest;
            $upperBound = $amounts[$closestKey + 1];
        } else {
            $lowerBound = $amounts[$closestKey - 1];
            $upperBound = $closest;
        }

        return ["lower" => $lowerBound, "upper" => $upperBound];
    }

    /**
     * @param float $search
     * @param array $array
     *
     * @return float|null
     */
    private function _getClosest(float $search, array $array): ?float
    {
        $closest = null;
        foreach ($array as $item) {
            if ($closest === null || abs($search - $closest) > abs($item - $search)) {
                $closest = $item;
            }
        }
        return $closest;
    }
}

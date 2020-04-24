<?php

namespace App\View\Helper;

use Cake\View\Helper;

class IntervalTimeHelper extends Helper
{
    public function createLabel($currentTime, $eventTime)
    {
        $interval = $eventTime->diff($currentTime);

        $intY = ($interval->y) > 0 ? $interval->format('%y an, ') : '';
        $intM = ($interval->m) > 0 ? $interval->format('%m mois et ') : '';
        $intD = ($interval->d) > 0 ? $interval->format('%d jours') : '';

        switch (true) {
            case ($currentTime < $eventTime):
                echo '<label class="label--incoming">A venir</label>';
                echo 'Dans ' . $intY . $intM . $intD;
                break;
            case ($currentTime > $eventTime):
                echo '<label class="label--done">Terminé</label>';
                break;
            case ($currentTime == $eventTime):
                echo '<label class="label--today">Today</label>';
                break;
            default:
                break;
        }
    }
}

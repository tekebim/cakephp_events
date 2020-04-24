<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\I18n\Time;

class IntervalTimeHelper extends Helper
{
    public function createLabel($eventBeginning)
    {
        $currentTime = Time::now();
        $eventTime = $eventBeginning;
        $interval = $eventTime->diff($currentTime);

        $intY = ($interval->y) > 0 ? $interval->format('%y an, ') : '';
        $intM = ($interval->m) > 0 ? $interval->format('%m mois et ') : '';
        $intD = ($interval->d) > 0 ? $interval->format('%d jours') : '';

        if ($eventTime->isToday()) {
            echo '<label class="label label--today">Today</label>';
            return;
        }

        if ($eventTime->isFuture()) {
            echo '<label class="label label--incoming">A venir</label>';
            echo '<p>Dans ' . $intY . $intM . $intD . '</p>';
            return;
        }

        if ($eventTime->isPast()) {
            echo '<label class="label label--done">Terminé</label>';
            return;
        }
    }
}

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

        $intY = ($interval->y) > 0 ? $interval->format('%y') : null;
        $intM = ($interval->m) > 0 ? $interval->format('%m') : null;
        $intD = ($interval->d) > 0 ? $interval->format('%d') : null;


        if($intY != null){
            $intY > 1 ? $intY  = $intY . ' ans, ' : $intY  = $intY . ' an, ';
        }
        if($intM != null){
            $intM > 1 ? $intM  = $intM . ' mois et ' : $intM  = $intM . ' mois et ';
        }
        if($intD != null){
            $intD > 1? $intD  = $intD . ' jours' : $intD  = $intD . ' jour';
        }

        if ($eventTime->isToday()) {
            echo '<label class="label label--today">Aujourd\'hui</label>';
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

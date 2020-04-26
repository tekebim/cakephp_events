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


        if ($intY != null) {
            $intY > 1 ? $intY = $intY . ' ans, ' : $intY = $intY . ' an, ';
        }
        if ($intM != null) {
            $intM > 1 ? $intM = $intM . ' mois et ' : $intM = $intM . ' mois et ';
        }
        if ($intD != null) {
            $intD > 1 ? $intD = $intD . ' jours' : $intD = $intD . ' jour';
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

    public function fromNow($datetime, $concat = false)
    {
        $currentTime = Time::now();
        $dateTime = $datetime;
        $interval = $dateTime->diff($currentTime);

        $intY = ($interval->y) > 0 ? $interval->format('%y') : null;
        $intM = ($interval->m) > 0 ? $interval->format('%m') : null;
        $intD = ($interval->d) > 0 ? $interval->format('%d') : null;
        $intH = ($interval->h) > 0 ? $interval->format('%h') : null;
        $intI = ($interval->i) > 0 ? $interval->format('%i') : null;
        $intS = ($interval->s) > 0 ? $interval->format('%s') : null;

        // Wording
        $yearSingular = 'ans, ';
        $yearPlural = 'an, ';
        $monthSingular = 'mois et ';
        $monthPlural = $monthSingular;
        $daySingular = 'jour';
        $dayPlural = 'jours';
        $dayConcat = 'j';
        $hourSingular = 'heure';
        $hourPlural = 'heures';
        $hourConcat = 'h';
        $minuteSingular = 'minute';
        $minutePlural = 'minutes';
        $minuteConcat = 'min';
        $secondSingular = 'seconde';
        $secondPlural = 'secondes';
        $secondConcat = 's';

        $fromY = null;
        $fromM = null;
        $fromD = null;
        $fromH = null;
        $fromI = null;
        $fromS = null;

        if ($intY != null) {
            if (!$concat) {
                $intY > 1 ? $fromY = $intY . ' ' . $yearPlural : $fromY = $intY . ' ' . $yearSingular;
            }
        }
        if ($intM != null) {
            $intM > 1 ? $fromM = $intM . ' ' . $monthPlural : $fromM = $intM . ' ' . $monthSingular;
        }
        if ($intD != null) {
            if (!$concat) {
                $intD > 1 ? $fromD = $intD . $dayPlural : $fromD = $intD . $daySingular;
            } else {
                $intD > 1 ? $fromD = $intD . $dayConcat : $fromD = $intD . $dayConcat;
            }
        }
        if ($intH != null) {
            if (!$concat) {
                $intH > 1 ? $fromH = $intH . ' ' . $hourPlural : $fromH = $intH . ' ' . $hourSingular;
            } else {
                $intH > 1 ? $fromH = $intH . $hourConcat : $fromH = $intH . $hourConcat;
            }
        }
        if ($intI != null) {
            if (!$concat) {
                $intI > 1 ? $fromI = $intI . ' ' . $minutePlural : $fromI = $intI . ' ' . $minuteSingular;
            } else {
                $intI > 1 ? $fromI = $intI . $minuteConcat : $fromI = $intI . $minuteConcat;
            }
        }
        if ($intS != null) {
            if (!$concat) {
                $intS > 1 ? $fromS = $intS . ' ' . $secondPlural : $fromS = $intS . ' ' . $secondSingular;
            } else {
                $intS > 1 ? $fromS = $intS . $secondConcat : $fromS = $intS . $secondConcat;
            }
        }

        // var_dump($currentTime);
        // var_dump($dateTime);
        // var_dump($interval);

        return ($fromY != null ? $fromY . ' ' : '') . ($fromM != null ? $fromM . ' ' : '') . ($fromD != null ? $fromD . ' ' : '') . ($fromH != null ? $fromH . ' ' : '') . ($fromI != null ? $fromI . ' ' : '') . ($fromS != null ? $fromS . ' ' : '');
    }
}

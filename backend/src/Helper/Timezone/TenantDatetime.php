<?php

namespace App\Helper\Timezone;

use App\Service\TenantPerson\TenantPersonService;

class TenantDatetime
{
    /**
     * @var TenantPersonService
     */
    private $tenantPersonService;

    public function __construct(TenantPersonService $tenantPersonService)
    {
        $this->tenantPersonService = $tenantPersonService;
    }

    public function convertStringToUTCDateTime(?string $dateTimeStr): ?\DateTime
    {
        $timeZone = $this->tenantPersonService->getTenant()->getTimezone();

        if ($dateTimeStr !== null && $dateTimeStr !== '') {
            try {
                if (empty($timeZone)) {
                    $timeZone = 'UTC';
                }

                if (is_string($timeZone)) {
                    $timeZone = new \DateTimeZone($timeZone);
                }

                $dateTime = new \DateTime($dateTimeStr, $timeZone);
                $dateTime->setTimezone(new \DateTimeZone('UTC'));

                return $dateTime;

            } catch (\Exception $e) {
                return null;
            }
        }

        return null;
    }

    public function convertDateStringToUTCDateTime(?string $dateStr, $isEndOfTheDay = false): ?\DateTime
    {
        $timeZone = $this->tenantPersonService->getTenant()->getTimezone();

        if ($dateStr !== null && $dateStr !== '') {
            try {
                if (empty($timeZone)) {
                    $timeZone = 'UTC';
                }

                if (is_string($timeZone)) {
                    $timeZone = new \DateTimeZone($timeZone);
                }

                if ($isEndOfTheDay) {
                    $dateStr = $dateStr . "23:59:59";
                } else {
                    $dateStr = $dateStr . "00:00:00";
                }

                $dateTime = new \DateTime($dateStr, $timeZone);
                $dateTime->setTimezone(new \DateTimeZone('UTC'));

                return $dateTime;

            } catch (\Exception $e) {
                return null;
            }
        }

        return null;
    }

    public function format(?\DateTime $dateTimeInUTC, $isObject = false)
    {
        if (is_null($dateTimeInUTC)) {
            return '';
        }

        $timeZone = $this->tenantPersonService->getTenant()->getTimezone();
        $datetimezone = new \DateTimeZone($timeZone);

        $dtz = $dateTimeInUTC->setTimezone($datetimezone);

        if($isObject === false) {
            return $dtz->format('d-m-Y H:i:s');
        }

        return $dtz;
    }

    public function setTenantTimezone(\DateTime $dateTimeInUTC)
    {
        $timeZone = $this->tenantPersonService->getTenant()->getTimezone();
        $datetimezone = new \DateTimeZone($timeZone);

        $dateTimeInUTC->setTimezone($datetimezone);
    }
}

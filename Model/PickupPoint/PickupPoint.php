<?php

namespace CleverAge\ColissimoBundle\Model\PickupPoint;

class PickupPoint
{
    private array $data;

    public function __construct(\SimpleXMLElement $data) {
        $this->data['id'] = $data->identifiant;
        $this->data['name'] = $data->nom;
        $this->data['disabledPersonAccess'] = $data->accesPersonneMobiliteReduite;
        $this->data['streetName'] = $data->adresse1;
        $this->data['premise'] = $data->adresse2;
        $this->data['locality'] = $data->adresse3;
        $this->data['city'] = $data->localite;
        $this->data['postalCode'] = $data->codePostal;
        $this->data['countryCode'] = $data->codePays;
        $this->data['partialClosed'] = $data->congesPartiel;
        $this->data['closed'] = $data->congesTotal;
        $this->data['latGeoCoord'] = $data->coordGeolocalisationLatitude;
        $this->data['longGeoCoord'] = $data->coordGeolocalisationLongitude;
        $this->data['range'] = $data->distanceEnMetre;
        $this->data['locationHelp'] = $data->indiceDeLocalisation;

        $this->data['openingsDateStart'] = $data->periodeActiviteHoraireDeb;
        $this->data['openingsDateEnd'] = $data->periodeActiviteHoraireFin;

        $this->data['openings'] = [
            'monday' => $this->formatRangeTime($data->horairesOuvertureLundi),
            'tuesday' => $this->formatRangeTime($data->horairesOuvertureMardi),
            'wednesday' => $this->formatRangeTime($data->horairesOuvertureMercredi),
            'thursday' => $this->formatRangeTime($data->horairesOuvertureJeudi),
            'friday' => $this->formatRangeTime($data->horairesOuvertureVendredi),
            'saturday' => $this->formatRangeTime($data->horairesOuvertureSamedi),
            'sunday' => $this->formatRangeTime($data->horairesOuvertureDimanche),
        ];

        if (isset($data->listeConges)) {
            $listeConges = $data->listeConges;
            $holidays = [];

            if (is_object($listeConges)) {
                $holidays[] = [
                    'start' => $listeConges->calendarDeDebut,
                    'end' => $listeConges->calendarDeFin,
                    'number' => $listeConges->numero,
                ];
            } else {
                foreach ($listeConges as $conges) {
                    $holidays[] = [
                        'start' => $conges->calendarDeDebut,
                        'end' => $conges->calendarDeFin,
                        'number' => $conges->numero,
                    ];
                }
            }

            $this->data['holidays'] = $holidays;
        }

        $this->data['maxWeight'] = $data->poidsMaxi;
        $this->data['pointType'] = $data->typeDePoint;
        $this->data['language'] = $data->langue;
        $this->data['countryLabel'] = $data->libellePays;
        $this->data['handlingTool'] = $data->loanOfHandlingTool;
        $this->data['parkingArea'] = $data->parking;
        $this->data['linkCode'] = $data->reseau;
        $this->data['distributionSort'] = $data->distributionSort;
        $this->data['pickupParcel'] = $data->lotAcheminement;
        $this->data['sortPlanVersion'] = $data->versionPlanTri;

        $this->transformValuesInString();
    }

    private function transformValuesInString(): void
    {
        foreach ($this->data as $key => $data) {
            if ($this->data[$key] instanceof \SimpleXMLElement) {
                $this->data[$key] = (string) $data;
            }
        }
    }

    private function formatRangeTime(string $hours): array
    {
        $partialOpenings = explode(' ', $hours);
        if (count($partialOpenings) !== 2) {
            return [];
        }

        $validOpenings = array_filter(
            $partialOpenings, static fn ($partial) => $partial !== '00:00-00:00',
        );

        if (count($validOpenings) === 2 && $validOpenings[0] === $validOpenings[1]) {
            return [$validOpenings[0]];
        }

        return $validOpenings;
    }

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return mixed|null
     */
    public function get(string $identifier)
    {
        if ($value = $this->data[$identifier]) {
            return $value;
        }

        return null;
    }
}

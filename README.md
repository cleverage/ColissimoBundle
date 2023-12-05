# CleverAge/ColissimoBundle

## Introduction

This bundle provides services to access and consume the Colissimo WS.

### Services

- [Shipping](https://www.colissimo.entreprise.laposte.fr/sites/default/files/2022-04/DT_Flexibilite_Expedition_Web_Service_Affranchissement_202204_FR.pdf)
- [Pickup points](https://www.colissimo.entreprise.laposte.fr/sites/default/files/2021-10/WebService-points-retrait_FR.pdf)
- [Tracking](https://www.colissimo.entreprise.laposte.fr/sites/default/files/2021-08/CDC_WebServiceTrackingTL-v2.1_FR.pdf)

### Requirements

- Php >= 7.4
- Symfony 4, 5 or 6

## Installation

### Pretty simple with [Composer](http://packagist.org), run

```sh
composer require cleverage/colissimo-bundle
```

### Register bundle inside your application :

```php
// config/bundles.php
CleverAge\ColissimoBundle\CleverAgeColissimoBundle::class => ['all' => true],
```

### Configuration example :

Inside `config/packages/cleverage_colissimo.yaml`

```yaml
clever_age_colissimo:
  testModeEnabled: true
  auth:
    contractNumber: '22020'
    password: 'password'
  letter:
    service:
      commercialName: 'CommercialName'
    sender:
      companyName: 'CompanyName'
      line0: null
      line1: null
      line2: '9 rue André darbon'
      line3: null
      countryCode: 'FR'
      zipCode: '33300'
      city: 'Bordeaux'
```

## Usage examples :

### Get pickup points

```php
class PickupPointsController extends AbstractController
{
    private PickupPointsService $pickupPointsService;

    public function __construct(
        PickupPointsService $pickupPointsService
    ) {
        $this->pickupPointsService = $pickupPointsService;
    }

    public function index()
    {
        $searchModel = new PickupPointsSearchModel(
            '33300',
            'Bordeaux',
            'FR',
            '18/07/2022',
        );

        // Return an array of PickupPoint::class
        $pickupPoints = $this->pickupPointsService->call($searchModel);

        foreach ($pickupPoints as $pickupPoint) {
            // Get data by identifier.
            // @see PickupPoint to show all identifiers available.
            echo $pickupPoint->get('id'); // 987178
            echo $pickupPoint->get('name'); // ALEX TISSUS
        }

        // ....
    }
}
```

### Get pickup point by ID

```php
class PickupPointByIdController extends AbstractController
{
    private PickupPointByIdService $pickupPointByIdService;

    public function __construct(
        PickupPointByIdService $pickupPointByIdService
    ) {
        $this->pickupPointByIdService = $pickupPointByIdService;
    }

    public function index()
    {
        $searchByIdModel = new PickupPointSearchByIdModel('987178', '18/07/2022');
        $pickupPoint = $this->pickupPointByIdService->call($searchByIdModel);

        if (null !== $pickupPoint) {
            echo $pickupPoint->get('name'); // ALEX TISSUS
        }

        // ....
    }
}
```

### Tracking

```php
class TrackingController extends AbstractController
{
    private TrackingService $trackingService;

    public function __construct(
        TrackingService $trackingService
    ) {
        $this->trackingService = $trackingService;
    }

    public function index()
    {
        $trackingSearchModel = new TrackingSearchModel();
        $trackingSearchModel
            ->setLang('FR') // FR is set by default. This line is optionnal.
            ->setParcelNumber('ABNUABSASNLK');

        $tracking = $this->trackingService->call($trackingSearchModel);

        $tracking->getParcel();
        $tracking->getSteps();
        $tracking->getEvents();

        // @see TrackingResponse::class for usable getters.
        // ....
    }
}
```

### Shipping

```php
class ShippingController extends AbstractController
{
    private ShippingService $shippingService;

    public function __construct(
        ShippingService $shippingService
    ) {
        $this->shippingService = $shippingService;
    }

    public function index()
    {
        $label = new Label();

        $outputFormat = new OutputFormat();
        $outputFormat->setOutputPrintingType(OutputPrintingType::ZPL_10x10_300dpi);

        $label->setOutputFormat($outputFormat);

        $letter = new Letter();

        $service = new Letter\Service();
        $service->setProductCode(ProductCode::DOM)
            ->setDepositDate((new \DateTime())->format('Y-d-m'))
            ->setOrderNumber('orderNumber');

        $letter->setService($service);

        $parcel = new Letter\Parcel();
        $parcel->setWeight(3);
        // If it's delivery on pickup point
        $parcel->setPickupLocationId('987178');

        $letter->setParcel($parcel);

        $addressee = new Letter\Addressee();
        $addressee->setEmail('test@clever-age.com')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setLine2('9 rue André darbon')
            ->setCity('Bordeaux')
            ->setCountryCode('FR')
            ->setZipCode('33300');

        $letter->setAddressee($addressee);

        $label->setLetter($letter);

        $shipping = $this->shippingService->call($label);

        echo $shipping->getParcelNumber(); // AIAOBOIABS
        echo $shipping->getPdfUrl(); // null or the pdf url.
        echo $shipping->getParcelNumberPartner(); // null or the parcel number partner.
        echo $shipping->getFields(); // Array of custom fields.

        // ...
    }
}
```

### Product inter

```php
class ProductInterController extends AbstractController
{
    private ProductInterService $productInterService;

    public function __construct(
        ProductInterService $productInterService
    ) {
        $this->productInterService = $productInterService;
    }

    public function index()
    {
        $productInter = new ProductInter();
        $productInter->setCountryCode('FR')
            ->setZipCode('33300')
            ->setProductCode(ProductCode::DOM)
            ->setInsurance(false) // Default false. Optional.
            ->setNonMachinable(false) // Default false. Optional.
            ->setReturnReceipt(false); // Default false. Optional.

        $response = $this->productInterService->call($productInter);

        $response->getProduct(); // Array of product codes.
        $response->getReturnTypeChoice(); // Array of return choice types.

        // ...
    }
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

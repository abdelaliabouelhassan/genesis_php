<?php

namespace spec\Genesis\API\Request\Financial\TravelData;

use Genesis\API\Request\Financial\TravelData\AirlineItineraryLegData;
use Genesis\API\Request\Financial\TravelData\Base\AidAttributes;
use Genesis\Exceptions\InvalidArgument;
use PhpSpec\ObjectBehavior;

class AirlineItineraryLegDataSpec extends ObjectBehavior
{

    public function let()
    {
        $this->beConstructedWith('2019-03-03', 'AB', 'C', 'SOF', 'PRG', 0, '2020-03-03', 'DDD');
    }

    function it_should_implements_base_class()
    {
        $this->shouldBeAnInstanceOf(AidAttributes::class);
    }

    public function it_should_work_with_valid_departure_date()
    {
        $this->shouldNotThrow()->during('setDepartureDate', ['2020-03-03']);
    }

    public function it_should_throw_with_departure_date_and_hour()
    {
        $this->shouldThrow()->during('setDepartureDate', ['2020-03-03 10:30']);
    }

    public function it_should_throw_with_invalid_departure_date_format()
    {
        $this->shouldThrow()->during('setDepartureDate', ['33-33-2020']);
    }

    public function it_should_work_with_valid_carrier_code()
    {
        $this->shouldNotThrow()->during('setCarrierCode', ['AB']);
    }

    public function it_should_work_with_valid_service_class()
    {
        $this->shouldNotThrow()->during('setServiceClass', ['C']);
    }

    public function it_should_work_with_valid_origin_city()
    {
        $this->shouldNotThrow()->during('setOriginCity', ['PRG']);
    }

    public function it_should_work_with_valid_destination_city()
    {
        $this->shouldNotThrow()->during('setDestinationCity', ['SOF']);
    }

    public function it_should_work_with_valid_stopover_code()
    {
        $this->shouldNotThrow()->during('setStopOverCode', ['1']);
    }

    public function it_should_work_with_valid_fare_basis_code()
    {
        $this->shouldNotThrow()->during('setFareBasisCode', ['1234']);
    }

    public function it_should_work_with_valid_flight_number()
    {
        $this->shouldNotThrow()->during('setFlightNumber', ['1234']);
    }

    public function it_should_work_with_valid_departure_time()
    {
        $this->shouldNotThrow()->during('setDepartureTime', ['07:33']);
    }

    public function it_should_work_with_valid_departure_time_segment()
    {
        $this->shouldNotThrow()->during('setDepartureTimeSegment', [AirlineItineraryLegData::DEPARTURE_TIME_SEGMENT_AM]);
    }

    public function it_should_work_with_valid_arrival_date()
    {
        $this->shouldNotThrow()->during('setArrivalDate', ['2020-03-03']);
    }

    public function it_should_not_fail_with_missing_arrival_date()
    {
        $this->shouldNotThrow()->during('setArrivalDate', [null]);
    }

    public function it_should_fail_with_invalid_arrival_date_format()
    {
        $this->shouldThrow(InvalidArgument::class)->during('setArrivalDate', ['03-03-2020']);
    }

    public function it_should_fail_with_invalid_carrier_code()
    {
        $this->shouldThrow()->during('setCarrierCode', ['ABC']);
    }

    public function it_should_not_fail_with_missing_carrier_code()
    {
        $this->shouldNotThrow()->during('setCarrierCode', [null]);
    }

    public function it_should_fail_with_invalid_service_class()
    {
        $this->shouldThrow()->during('setServiceClass', ['CC']);
    }

    public function it_should_not_fail_with_missing_service_class()
    {
        $this->shouldNotThrow()->during('setServiceClass', [null]);
    }

    public function it_should_fail_with_invalid_origin_city()
    {
        $this->shouldThrow()->during('setOriginCity', ['PRGD']);
    }

    public function it_should_not_fail_with_missing_origin_city()
    {
        $this->shouldNotThrow()->during('setOriginCity', [null]);
    }

    public function it_should_fail_with_invalid_destination_city()
    {
        $this->shouldThrow()->during('setDestinationCity', ['SOFD']);
    }

    public function it_should_not_fail_with_missing_destination_city()
    {
        $this->shouldNotThrow()->during('setDestinationCity', [null]);
    }

    public function it_should_fail_with_invalid_stopover_code()
    {
        $this->shouldThrow()->during('setStopoverCode', ['55']);
    }

    public function it_should_not_fail_with_missing_stopover_code()
    {
        $this->shouldNotThrow()->during('setStopoverCode', [null]);
    }

    public function it_should_fail_with_invalid_fare_basis_code()
    {
        $this->shouldThrow()->during('setFareBasisCode', ['123444444']);
    }

    public function it_should_fail_with_missing_fare_basis_code()
    {
        $this->shouldNotThrow()->during('setFareBasisCode', [null]);
    }

    public function it_should_fail_with_invalid_flight_number()
    {
        $this->shouldThrow()->during('setFlightNumber', ['12344444']);
    }

    public function it_should_fail_with_invalid_departure_time()
    {
        $this->shouldThrow()->during('setDepartureTime', ['07:33:12']);
    }

    public function it_should_fail_with_invalid_departure_time_segment()
    {
        $this->shouldThrow()->during('setDepartureTimeSegment', ['AM']);
    }
}

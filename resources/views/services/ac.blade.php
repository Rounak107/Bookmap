@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4">Air Conditioner Services</h2>

  <!-- Foam Jet Cleaning Service -->
  <div class="card mb-4">
    <div class="card-header bg-primary text-white">Foam Jet Cleaning Service</div>
    <div class="card-body">
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between">1 AC <span>₹549</span> <a href="#" class="btn btn-sm btn-success">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">2 ACs <span>₹1,049</span> <a href="#" class="btn btn-sm btn-success">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">3 ACs <span>₹1,400</span> <a href="#" class="btn btn-sm btn-success">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">4 ACs <span>₹1,900</span> <a href="#" class="btn btn-sm btn-success">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">5 ACs <span>₹2,400</span> <a href="#" class="btn btn-sm btn-success">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">Lite AC Service <span>₹449</span> <a href="#" class="btn btn-sm btn-success">Book</a></li>
      </ul>
      <h5>Service Includes:</h5>
      <ul>
        <li>Indoor unit cleaning using foam and high-pressure jet spray</li>
        <li>Outdoor unit cleaning with high-pressure jet spray</li>
        <li>Free gas level check-up</li>
      </ul>
      <h5>How It Works:</h5>
      <ul>
        <li>Pre-Service Checks: Detailed inspection & gas level check</li>
        <li>Mess-Free Cleaning: Protective jacket used to avoid spills</li>
        <li>Indoor Cleaning: Filters, coils, fins, and drain trays cleaned using foam and jet spray</li>
        <li>Outdoor Cleaning: Dismantling & jet cleaning of outdoor unit (if accessible)</li>
        <li>Final Checks: Drain tray inspection, pipe blockage check, and area cleanup</li>
      </ul>
    </div>
  </div>

  <!-- AC Repair & Gas Refill -->
  <div class="card mb-4">
    <div class="card-header bg-danger text-white">AC Repair & Gas Refill Services</div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between">Low/No Cooling Repair <span>₹249</span> <a href="#" class="btn btn-sm btn-danger">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">Power Issue Repair <span>₹249</span> <a href="#" class="btn btn-sm btn-danger">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">Noise/Smell Issue Repair <span>₹449</span> <a href="#" class="btn btn-sm btn-danger">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">Water Leakage Repair <span>₹599</span> <a href="#" class="btn btn-sm btn-danger">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">Gas Leak Repair & Refill <span>₹2,599</span> <a href="#" class="btn btn-sm btn-danger">Book</a></li>
      </ul>
    </div>
  </div>

  <!-- AC Installation & Uninstallation -->
  <div class="card mb-4">
    <div class="card-header bg-info text-white">AC Installation & Uninstallation</div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between">Split AC Installation <span>₹1,599</span> <a href="#" class="btn btn-sm btn-info">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">Window AC Installation <span>₹999</span> <a href="#" class="btn btn-sm btn-info">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">Split AC Uninstallation <span>₹799</span> <a href="#" class="btn btn-sm btn-info">Book</a></li>
        <li class="list-group-item d-flex justify-content-between">Window AC Uninstallation <span>₹599</span> <a href="#" class="btn btn-sm btn-info">Book</a></li>
      </ul>
    </div>
  </div>
</div>
@endsection

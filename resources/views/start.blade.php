@extends('layouts.app')
@section('title', 'Home')
@section('content')
<body class="text-white">

  <nav class="flex justify-between items-center px-4 py-2 bg-gray-800">
   <div class="flex space-x-4">
    <a class="nav-link {{ !$role ? 'active bg-blue-600' : '' }} px-4 py-2 rounded text-white hover:bg-blue-500" 
       href="{{ route('start') }}">
     ALL
    </a>
    @foreach($roles as $roleItem)
    <a class="nav-link {{ $role === $roleItem ? 'active bg-blue-600' : '' }} px-4 py-2 rounded text-white hover:bg-blue-500" 
       href="{{ route('start', ['role' => $roleItem]) }}">
     {{ $roleItem }}
    </a>
    @endforeach
   </div>
   <div class="flex items-center space-x-2 text-white" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
        <span>
            {{ $selectedLane ?? 'All' }}
        </span>
        <i class="fas fa-chevron-down"></i>
    </button>
    
    <!-- Dropdown Menu -->
    <div x-show="open" 
         @click.away="open = false"
         class="absolute right-4 mt-32 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
        <div class="py-1">
            <a href="{{ route('start') }}" 
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                All
            </a>
            
            @foreach(['Midlaner', 'Jungler', 'EXP Laner', 'Gold Laner', 'Roamer'] as $laneOption)
                <a href="{{ route('start', ['lane' => $laneOption]) }}" 
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ $selectedLane === $laneOption ? 'bg-gray-100' : '' }}">
                    {{ $laneOption }}
                </a>
            @endforeach
        </div>
    </div>
   </div>
  </nav>
  
<main class="p-4">
   <div class="grid grid-cols-7 gap-4">
    @foreach($heroes as $hero)
        <div class="hero-card p-4 rounded">
            <img alt="Hero {{ $hero->name }}" 
                 class="rounded" 
                 height="300" 
                 src="{{ Storage::url($hero->image) }}" 
                 width="200"/>
            <p class="text-center mt-2">
                {{ $hero->name }}
            </p>
            <p class="text-center text-sm text-gray-600">
                {{ $hero->roles_display }}
            </p>
        </div>
    @endforeach
   </div>
</main>
@endsection

<style>
    [x-cloak] { 
        display: none !important; 
    }
    
    .dropdown-menu {
        transform-origin: top right;
        transition: all 0.1s ease-out;
    }
    
    .dropdown-menu.open {
        transform: scale(1);
        opacity: 1;
    }
    
    .dropdown-menu.closed {
        transform: scale(0.95);
        opacity: 0;
    }
</style>

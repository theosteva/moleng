@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes lightning {
        0% { opacity: 0; }
        10% { opacity: 1; }
        20% { opacity: 0; }
        30% { opacity: 1; }
        40% { opacity: 0; }
        100% { opacity: 0; }
    }

    .animate-fadeIn {
        animation: fadeIn 2s ease-in;
    }

    .lightning {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent 45%, rgba(238, 238, 238, 0.1) 50%, transparent 55%);
        animation: lightning 5s infinite;
        pointer-events: none;
    }

    .lightning:nth-child(2) {
        animation-delay: 1.5s;
    }

    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
</style>
@endpush

@section('content')
<!-- Interaction overlay -->
<div id="audioOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center cursor-pointer">
    <div class="text-center text-white">
        <i class="fas fa-play-circle text-6xl mb-4"></i>
        <p class="text-xl">Click anywhere to start the experience</p>
    </div>
</div>

<div class="relative min-h-screen flex items-center overflow-hidden">
    <audio id="bgMusic" loop>
        <source src="{{ asset('audio/test.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>

    <!-- Background image -->
    <div class="absolute inset-0 z-0">
        <img src="https://i.pinimg.com/originals/bd/72/3d/bd723ddfda02d53ad142787f55ff601d.gif"
             class="w-full h-full object-cover opacity-50"
             alt="Mobile Legends Background">
        <!-- Lightning effects -->
        <div class="lightning"></div>
        <div class="lightning"></div>
    </div>
    
    <!-- Content dengan z-index lebih tinggi -->
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center animate-fadeIn">
            <h1 class="text-5xl font-bold mb-6 drop-shadow-lg">Welcome to Mobile Legends Analyzer</h1>
            <p class="text-2xl text-gray-300 mb-8 drop-shadow-lg">Find the perfect heroes combination for your team</p>
            
            <div class="flex justify-center gap-6">
                <a href="{{ route('start') }}" 
                   class="bg-gray-800 hover:bg-blue-700 text-xl text-blue-300 px-8 py-4 rounded-full transition duration-300 hover:scale-105 transform">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Update script untuk menangani interaksi -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const audio = document.getElementById('bgMusic');
        const overlay = document.getElementById('audioOverlay');
        audio.volume = 0.2;

        overlay.addEventListener('click', function() {
            audio.play()
                .then(() => {
                    overlay.style.animation = 'fadeOut 0.5s';
                    setTimeout(() => {
                        overlay.remove();
                    }, 500);
                })
                .catch(error => console.log("Playback failed:", error));
        });
    });
</script>
@endsection

@extends('website.layouts.app')

@section('title', $highlight->title)

@section('content')
    @php
        $tagLabel = config('constants.highlights.tags.'.$highlight->tag, $highlight->tag);
        $heroBg   = $highlight->type === 'video'
            ? ($highlight->thumbnail_full_url ?: $highlight->media_full_url)
            : $highlight->media_full_url;
    @endphp

    {{-- =========== FULL-PAGE HERO (title, tag, type, location — all here) =========== --}}
    <section id="hero"
             style="position: relative;
                    min-height: 100vh;
                    height: auto;
                    padding: 8rem 2rem 4rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                    color: #fff;
                    background-color: #000;
                    @if($heroBg) background-image: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('{{ $heroBg }}'); @endif
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;">
        <div style="max-width: 900px; width: 100%; position: relative; z-index: 2;">
            <div style="margin-bottom: 2rem;">
                <a href="{{ route('home') }}#gallery"
                   style="display: inline-flex; align-items: center; gap: 0.5rem; color: #fff; text-decoration: none; font-size: 0.85rem; font-weight: 500; letter-spacing: 1.5px; text-transform: uppercase; opacity: 0.9;">
                    <i class="bi bi-arrow-left"></i> BACK
                </a>
            </div>

            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                @if($highlight->tag)
                    <span style="padding: 6px 14px; border-radius: 20px; background: var(--color-champagne, #d4af37); color: #000; font-size: 0.72rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase;">
                        {{ $tagLabel }}
                    </span>
                @endif
                @if($highlight->type === 'video')
                    <span style="padding: 6px 12px; border-radius: 4px; background: rgba(255,255,255,0.2); color: #fff; font-size: 0.72rem; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                        ▶ Video
                    </span>
                @else
                    <span style="padding: 6px 12px; border-radius: 4px; background: rgba(255,255,255,0.2); color: #fff; font-size: 0.72rem; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">
                        🖼 Photo
                    </span>
                @endif
            </div>

            <h1 style="font-family: var(--font-serif, 'Cormorant Garamond', serif); font-size: clamp(2.5rem, 6vw, 5rem); margin: 0 0 1.5rem; line-height: 1.1; color: #fff;">
                {{ $highlight->title }}
            </h1>

            @if($highlight->location)
                <p style="color: rgba(255,255,255,0.85); font-size: 1rem; letter-spacing: 1px; margin-bottom: 3rem;">
                    <i class="bi bi-geo-alt"></i> {{ $highlight->location }}
                </p>
            @endif

            {{-- Scroll indicator (only if there is content below) --}}
            @if($highlight->description || $highlight->activeMedias->isNotEmpty())
                <div style="position: absolute; bottom: 2rem; left: 50%; transform: translateX(-50%); color: rgba(255,255,255,0.7); font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; animation: bounce 2s infinite;">
                    <div>SCROLL</div>
                    <i class="bi bi-chevron-down" style="font-size: 1.2rem; margin-top: 4px;"></i>
                </div>
            @endif
        </div>
    </section>

    {{-- =========== DESCRIPTION + GALLERY (only if there is content) =========== --}}
    @if($highlight->description || $highlight->activeMedias->isNotEmpty())
        <section style="padding: 5rem 2rem; background: var(--color-ivory, #f7f4ee);">
            <div class="container-max" style="max-width: 1200px; margin: 0 auto;">

                @if($highlight->description)
                    <div style="max-width: 820px; margin: 0 auto 4rem;">
                        <div style="font-size: 1.15rem; line-height: 1.8; color: var(--text-secondary, #555); white-space: pre-line; text-align: center;">
                            {{ $highlight->description }}
                        </div>
                    </div>
                @endif

                @if($highlight->activeMedias->isNotEmpty())
                    <div class="highlight-media-gallery">
                        <h2 style="font-family: var(--font-serif, 'Cormorant Garamond', serif); font-size: clamp(1.75rem, 3.5vw, 2.75rem); text-align: center; margin-bottom: 3rem; color: var(--color-charcoal, #1a1a1a);">
                            The Full Story
                        </h2>

                        <div class="media-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.25rem;">
                            @foreach($highlight->activeMedias as $m)
                                @if($m->type === 'video')
                                    <div class="media-item video-item"
                                         style="position: relative; border-radius: 10px; overflow: hidden; aspect-ratio: 4/3; background: #000; cursor: pointer; transition: transform 0.3s ease;"
                                         data-type="video"
                                         data-src="{{ $m->media_full_url }}"
                                         data-poster="{{ $m->thumbnail_full_url ?? '' }}">
                                        @if($m->thumbnail_full_url)
                                            <img src="{{ $m->thumbnail_full_url }}" alt="Video preview" loading="lazy"
                                                 style="width:100%; height:100%; object-fit:cover;">
                                        @else
                                            <video src="{{ $m->media_full_url }}" muted
                                                   style="width:100%; height:100%; object-fit:cover;"></video>
                                        @endif
                                        <div style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center; background: rgba(0,0,0,0.3);">
                                            <div style="width:64px; height:64px; border-radius:50%; background: rgba(255,255,255,0.95); display:flex; align-items:center; justify-content:center; font-size:24px; color:#000;">
                                                ▶
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="media-item image-item"
                                         style="position: relative; border-radius: 10px; overflow: hidden; aspect-ratio: 4/3; background: rgba(0,0,0,0.05); cursor: pointer;"
                                         data-type="image"
                                         data-src="{{ $m->media_full_url }}">
                                        <img src="{{ $m->media_full_url }}" alt="Gallery image" loading="lazy"
                                             style="width:100%; height:100%; object-fit:cover; transition: transform 0.4s ease;">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- Lightbox Modal --}}
                    <div id="highlight-lightbox" style="display:none; position: fixed; inset: 0; z-index: 9999; background: rgba(0,0,0,0.92); align-items: center; justify-content: center; padding: 2rem;">
                        <button id="lightbox-close" type="button"
                                style="position: absolute; top: 20px; right: 24px; background: transparent; border: 0; color: #fff; font-size: 32px; cursor: pointer;">×</button>
                        <div id="lightbox-content" style="max-width: 90vw; max-height: 90vh;"></div>
                    </div>
                @endif

                {{-- CTA --}}
                <div style="max-width: 820px; margin: 5rem auto 0; padding-top: 2.5rem; border-top: 1px solid rgba(0,0,0,0.1); display: flex; gap: 1rem; flex-wrap: wrap; justify-content: space-between; align-items: center;">
                    <a href="{{ route('home') }}#gallery" class="btn btn-outline"
                       style="display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="bi bi-arrow-left"></i> BACK TO GALLERY
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        START A PROJECT →
                    </a>
                </div>

            </div>
        </section>
    @endif

    <style>
        @keyframes bounce {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50%      { transform: translateX(-50%) translateY(-8px); }
        }
        .media-item:hover img { transform: scale(1.05); }
        .media-item { transition: transform 0.3s ease; }
        .media-item:hover { transform: translateY(-4px); }
    </style>
@endsection

@section('scripts')
<script>
    (function () {
        const items = document.querySelectorAll('.media-item');
        const lightbox = document.getElementById('highlight-lightbox');
        const content  = document.getElementById('lightbox-content');
        const closeBtn = document.getElementById('lightbox-close');
        if (!items.length || !lightbox) return;

        function open(node) {
            const type = node.getAttribute('data-type');
            const src  = node.getAttribute('data-src');
            const poster = node.getAttribute('data-poster') || '';
            if (!src) return;

            if (type === 'video') {
                content.innerHTML = `<video src="${src}" ${poster ? `poster="${poster}"` : ''} controls autoplay style="max-width:90vw; max-height:90vh; display:block; border-radius:8px;"></video>`;
            } else {
                content.innerHTML = `<img src="${src}" alt="" style="max-width:90vw; max-height:90vh; display:block; border-radius:8px;">`;
            }
            lightbox.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function close() {
            lightbox.style.display = 'none';
            content.innerHTML = '';
            document.body.style.overflow = '';
        }

        items.forEach(item => item.addEventListener('click', () => open(item)));
        closeBtn.addEventListener('click', close);
        lightbox.addEventListener('click', (e) => { if (e.target === lightbox) close(); });
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') close(); });
    })();
</script>
@endsection

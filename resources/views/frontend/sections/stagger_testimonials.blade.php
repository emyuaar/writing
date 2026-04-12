@php
    $content = $section->content ?? [];
    $items = $content['items'] ?? [
        ['name' => 'Dr. James Thorne', 'role' => 'University of Oxford', 'quote' => 'The methodological rigor and attention to detail provided by the advisors was instrumental in my successful defense.', 'image' => 'https://i.pravatar.cc/150?u=oxford'],
        ['name' => 'Helena Vance', 'role' => 'LSE PhD Candidate', 'quote' => "A true atelier for academic work. They don't just edit; they understand the scholarly conversation.", 'image' => 'https://i.pravatar.cc/150?u=lse'],
        ['name' => 'Dr. Aris Thorne', 'role' => 'PhD in Political Economy', 'quote' => 'Navigating the terminal contribution is daunting. Having a senior advisor who knows the standard made all the difference.', 'image' => 'https://i.pravatar.cc/150?u=econ'],
        ['name' => 'Sophia Miller', 'role' => 'Kings College London', 'quote' => 'Expert guidance from proposal to final submission. The best investment I made in my PhD journey.', 'image' => 'https://i.pravatar.cc/150?u=kcl'],
        ['name' => 'Robert Chen', 'role' => 'Cambridge Research Fellow', 'quote' => 'A sophisticated approach to dissertation support. Highly recommended for serious candidates.', 'image' => 'https://i.pravatar.cc/150?u=cambridge'],
    ];
@endphp

<section class="py-16 sm:py-32 lg:py-44 bg-[#F4F1EE] overflow-hidden" 
         x-data="{ 
            testimonials: @js($items),
            cardSize: 365,
            init() {
                this.updateSize();
                window.addEventListener('resize', () => this.updateSize());
            },
            updateSize() {
                this.cardSize = window.innerWidth >= 640 ? 365 : 290;
            },
            handleMove(steps) {
                if (steps > 0) {
                    for (let i = steps; i > 0; i--) {
                        const item = this.testimonials.shift();
                        this.testimonials.push(item);
                    }
                } else {
                    for (let i = steps; i < 0; i++) {
                        const item = this.testimonials.pop();
                        this.testimonials.unshift(item);
                    }
                }
            }
         }">
    
    <div class="max-w-screen-2xl mx-auto px-6 sm:px-8 lg:px-16 mb-12 sm:mb-24 text-center lg:text-left">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 bg-white border border-gold/20 rounded-full shadow-sm mb-6 sm:mb-8">
            <span class="w-1.5 h-1.5 bg-gold rounded-full animate-pulse"></span>
            <span class="text-[10px] font-black tracking-[4px] uppercase text-primary/60 italic leading-none">Scholar Testimonials</span>
        </div>
        <h2 class="text-4xl sm:text-5xl lg:text-7xl font-medium text-primary leading-[1.1] tracking-[-0.03em] font-['Cormorant_Garamond'] mb-6 sm:mb-8">
            {{ $content['heading'] ?? 'Scholarly Success Stories' }}
        </h2>
        <p class="text-primary/50 text-lg lg:text-xl leading-relaxed max-w-2xl font-medium mx-auto lg:mx-0">
            {{ $content['paragraph'] ?? 'Join thousands of doctoral candidates who secured their terminal degree with our support.' }}
        </p>
    </div>

    <div class="relative w-full overflow-hidden" style="height: 600px;">
        <template x-for="(testimonial, index) in testimonials" :key="testimonial.name + index">
            @php
                // We calculate position dynamically in JS below
            @endphp
            <div
                @click="const pos = index - Math.floor(testimonials.length / 2); handleMove(pos)"
                class="absolute left-1/2 top-1/2 cursor-pointer border-2 p-6 sm:p-10 transition-all duration-700 ease-in-out group"
                :class="{
                    'z-20 bg-primary text-white border-primary shadow-[0_45px_100px_-15px_rgba(13,34,63,0.3)]': (index === Math.floor(testimonials.length / 2)),
                    'z-10 bg-white text-primary border-primary/5 hover:border-gold/30': (index !== Math.floor(testimonials.length / 2))
                }"
                :style="`
                    width: ${cardSize}px;
                    height: ${cardSize}px;
                    clip-path: polygon(50px 0%, calc(100% - 50px) 0%, 100% 50px, 100% 100%, calc(100% - 50px) 100%, 50px 100%, 0 100%, 0 0);
                    transform: translate(-50%, -50%) 
                               translateX(${(cardSize / 1.5) * (index - Math.floor(testimonials.length / 2))}px)
                               translateY(${(index === Math.floor(testimonials.length / 2)) ? -65 : (index % 2 ? 15 : -15)}px)
                               rotate(${(index === Math.floor(testimonials.length / 2)) ? 0 : (index % 2 ? 2.5 : -2.5)}deg);
                `"
            >
                <!-- Beveled Corner Accent -->
                <span
                    class="absolute block origin-top-right rotate-45"
                    :class="(index === Math.floor(testimonials.length / 2)) ? 'bg-gold/40' : 'bg-primary/10'"
                    style="right: -2px; top: 48px; width: 70.7px; height: 1.5px;"
                ></span>

                <div class="relative mb-4 sm:mb-8">
                    <img
                        :src="testimonial.image"
                        :alt="testimonial.name"
                        class="h-12 w-12 sm:h-16 sm:w-14 object-cover object-top rounded-lg shadow-xl"
                        :style="(index === Math.floor(testimonials.length / 2)) ? 'box-shadow: 4px 4px 0px #CEA152' : 'box-shadow: 4px 4px 0px rgba(13,34,63,0.1)'"
                    />
                </div>

                <h3 class="text-base sm:text-2xl font-medium font-['Cormorant_Garamond'] leading-snug sm:leading-tight mb-2 sm:mb-4 italic line-clamp-4 sm:line-clamp-none"
                    :class="(index === Math.floor(testimonials.length / 2)) ? 'text-white' : 'text-primary'">
                    &ldquo;<span x-text="testimonial.quote"></span>&rdquo;
                </h3>
                
                <div class="absolute bottom-6 left-6 right-6 sm:bottom-10 sm:left-10 sm:right-10 flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4">
                    <div class="w-8 h-px bg-gold/50 hidden sm:block"></div>
                    <div class="space-y-0.5">
                        <p class="text-[10px] sm:text-xs font-bold uppercase tracking-widest leading-none" :class="(index === Math.floor(testimonials.length / 2)) ? 'text-gold' : 'text-primary'" x-text="testimonial.name"></p>
                        <p class="text-[8px] sm:text-[10px] font-black uppercase tracking-[2px] opacity-40 leading-none truncate w-full" :class="(index === Math.floor(testimonials.length / 2)) ? 'text-white' : 'text-primary/60'" x-text="testimonial.role"></p>
                    </div>
                </div>
            </div>
        </template>

        <!-- Refined Navigation Array -->
        <div class="absolute bottom-6 left-1/2 flex -translate-x-1/2 gap-4 z-30">
            <button
                @click="handleMove(-1)"
                class="flex h-10 w-10 items-center justify-center bg-white border border-primary/10 text-primary shadow-sm hover:bg-primary hover:text-white transition-all duration-500 rounded-full"
                aria-label="Previous testimonial"
            >
                <span class="material-symbols-outlined !text-lg">arrow_back</span>
            </button>
            <button
                @click="handleMove(1)"
                class="flex h-10 w-10 items-center justify-center bg-primary text-gold shadow-lg hover:scale-110 transition-all duration-500 rounded-full"
                aria-label="Next testimonial"
            >
                <span class="material-symbols-outlined !text-lg">arrow_forward</span>
            </button>
        </div>
    </div>
</section>

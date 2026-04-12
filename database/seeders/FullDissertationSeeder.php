<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Service;
use App\Models\PageSection;

class FullDissertationSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ensure Category exists
        $category = Category::updateOrCreate(
            ['slug' => 'dissertation-writing'],
            ['name' => 'Dissertation Writing', 'type' => 'service']
        );

        // 2. Setup the Service
        $service = Service::updateOrCreate(
            ['slug' => 'full-dissertation-writing'],
            [
                'name' => 'Full Dissertation',
                'category_id' => $category->id,
                'short_description' => 'Comprehensive academic support for PhD, PG, and UG dissertation projects.',
                'description' => 'Guided support for dissertation literature reviews, methodology, and final analysis.',
                'features' => ['UK Standards Aligned', '100% Originality', 'Bespoke Research', 'PhD Faculty Advisors'],
                'is_published' => true,
                'is_featured' => true,
                'sort_order' => 1,
                'seo_metadata' => [
                    'title' => 'Full Dissertation Help | Expert Academic Writing Support',
                    'description' => 'Get expert help with your dissertation. Aligned with UK university guidelines, credible research, and accurate referencing.',
                ]
            ]
        );

        // Clear existing sections
        $service->sections()->delete();

        // 3. Build the Premium Page Structure
        
        // SECTION A: Hero + Side Form
        $service->sections()->create([
            'type' => 'hero_side_form',
            'sort_order' => 10,
            'is_active' => true,
            'content' => [
                'badge' => 'Elite Academic Consultancy',
                'title' => 'Struggling with Your Dissertation? Get Expert Help That Actually Improves Your Grade.',
                'subtitle' => "If your dissertation deadline is approaching and you feel stuck or overwhelmed—you’re not alone. We provide structured support for students starting from scratch or refining existing drafts to meet supervisor expectations.",
                'image_url' => 'https://images.unsplash.com/photo-1524311586216-996417a00fb4?q=80&w=2670', // High-end library look
                'form_title' => 'Request Dissertation Support',
                'form_subtitle' => 'Receive topic refinement and a clear research roadmap.',
                'form_button' => 'Get Free Consultation',
                'cta_label' => 'Review Our Academic Standards',
                'cta_link' => '#commitment'
            ]
        ]);

        // SECTION B: Trusted Academic Support (Benefit Cards)
        $service->sections()->create([
            'type' => 'why_choose_us',
            'sort_order' => 20,
            'is_active' => true,
            'content' => [
                'heading' => 'Trusted Support That Delivers Results',
                'paragraph' => 'We support candidates across PhD, Postgraduate, and Undergraduate levels with work aligned to UK university expectations.',
                'image_url' => 'https://images.unsplash.com/photo-1517842645767-c6370d6778e0?q=80&w=2670',
                'stat_value' => '99%',
                'stat_label' => 'Student Approval Rate',
                'highlights' => [
                    ['icon' => 'edit_note', 'title' => 'Structured Academic Writing', 'text' => 'Clear, professionally structured work that meets rigid academic standards.'],
                    ['icon' => 'library_books', 'title' => 'Strong Research', 'text' => 'Utilising credible scholarly sources and authoritative academic literature.'],
                    ['icon' => 'history_edu', 'title' => 'Accurate Referencing', 'text' => 'Perfectly formatted citations: Harvard, APA, MLA, OSCOLA.'],
                    ['icon' => 'school', 'title' => 'Tailored Aligned Guidelines', 'text' => 'Work strictly aligned with your specific university handbook and rubric.'],
                ]
            ]
        ]);

        // SECTION C: Free Dissertation Plan (Conversion Banner)
        $service->sections()->create([
            'type' => 'cta_banner',
            'sort_order' => 30,
            'is_active' => true,
            'content' => [
                'heading' => 'Get a Free Dissertation Plan in Minutes',
                'paragraph' => "Share your brief to receive research direction, a clear chapter outline, and personalised level-based guidance.",
                'cta_primary_label' => 'Request My Free Plan',
                'cta_primary_link' => '#hero',
                'cta_secondary_label' => 'Speak to an Advisor',
                'cta_secondary_link' => '/contact-us',
            ]
        ]);

        // SECTION D: How It Works
        $service->sections()->create([
            'type' => 'progress_ledger',
            'sort_order' => 40,
            'is_active' => true,
            'content' => [
                'heading' => 'A Multi-Stage Curated Process',
                'paragraph' => 'Transparent, rigorous development for your terminal contribution.',
                'steps' => [
                    ['number' => '01', 'title' => 'Share Your Requirements', 'text' => 'Submit your topic, deadline, and university guidelines for faculty review.'],
                    ['number' => '02', 'title' => 'Receive a Structured Plan', 'text' => 'Get a clear approach with a definitive timeline and academic research direction.'],
                    ['number' => '03', 'title' => 'Work With an Expert', 'text' => 'Your work is developed step-by-step with senior advisor updates and revisions.'],
                ]
            ]
        ]);

        // SECTION E: Dissertation & Assignment Services (Feature Grid)
        $service->sections()->create([
            'type' => 'feature_grid',
            'sort_order' => 50,
            'is_active' => true,
            'content' => [
                'heading' => 'Complete Academic Support Architecture',
                'paragraph' => 'Bespoke services tailored to individual project requirements.',
                'items' => [
                    [
                        'icon' => 'history_edu', 
                        'title' => 'Full Dissertation Writing', 
                        'text' => 'From proposal to submission, covering literature reviews, methodology, and authoritative analysis.',
                        'is_primary' => false
                    ],
                    [
                        'icon' => 'edit_document', 
                        'title' => 'Assignment & Coursework', 
                        'text' => 'Carefully structured essays, reports, and case studies aligned with your marking criteria.',
                        'is_secondary' => false
                    ],
                    [
                        'icon' => 'spellcheck', 
                        'title' => 'Editing & Proofreading', 
                        'text' => 'Refining clarity, academic tone, structure, and referencing for submission readiness.',
                        'is_primary' => false
                    ],
                    [
                        'icon' => 'published_with_changes', 
                        'title' => 'Resubmission Support', 
                        'text' => 'Restructuring and improving rejected or low-graded work to meet strict expectations.',
                        'is_secondary' => true // Darker accent
                    ],
                ]
            ]
        ]);

        // SECTION F: Academic Support Commitment (Atelier Standard Cards)
        $service->sections()->create([
            'type' => 'why_choose_us',
            'sort_order' => 60,
            'is_active' => true,
            'content' => [
                'heading' => 'The Atelier Standard Commitment',
                'paragraph' => 'Foundational principles of scholarly integrity and student success.',
                'image_url' => 'https://images.unsplash.com/photo-1521791136064-7986c2959210?q=80&w=2670',
                'stat_value' => '100%',
                'stat_label' => 'Originality',
                'highlights' => [
                    ['icon' => 'verified', 'title' => '100% Original Content', 'text' => 'Custom-written work crafted from scratch for your specific project.'],
                    ['icon' => 'lock', 'title' => 'Confidential & Secure', 'text' => 'Strict data protocols ensuring total candidate anonymity and safety.'],
                    ['icon' => 'chat_bubble', 'title' => 'Clear Communication', 'text' => 'Transparent updates and senior advisor contact throughout your venture.'],
                    ['icon' => 'flag', 'title' => 'UK Academic Standards', 'text' => 'Work strictly aligned with the highest standards of British Higher Education.'],
                ]
            ]
        ]);

        // SECTION G: Student Feedback (Staggered Success Stories)
        $service->sections()->create([
            'type' => 'stagger_testimonials',
            'sort_order' => 70,
            'is_active' => true,
            'content' => [
                'heading' => 'Scholarly Success Stories',
                'paragraph' => 'Experiences from doctoral and postgraduate candidates.',
                'items' => [
                    [
                        'name' => 'Sarah M.',
                        'role' => 'PhD Candidate, Social Sciences',
                        'image' => 'https://i.pravatar.cc/150?img=1',
                        'quote' => '“I was struggling with my dissertation structure and feedback. The guidance I received helped me organise my work properly and improve my final grade.”'
                    ],
                    [
                        'name' => 'James T.',
                        'role' => 'Master of Law (LLM)',
                        'image' => 'https://i.pravatar.cc/150?img=2',
                        'quote' => '“Very helpful and responsive team. My assignment was well-structured, properly referenced, and delivered on time.”'
                    ]
                ]
            ]
        ]);

        // SECTION H: FAQ
        $service->sections()->create([
            'type' => 'faq_accordion',
            'sort_order' => 80,
            'is_active' => true,
            'content' => [
                'heading' => 'Inquiries & Clarifications',
                'items' => [
                    ['question' => 'Is the work original?', 'answer' => 'Yes, every masterpiece is a 100% custom-written scholarly contribution, crafted from scratch and checked for total originality.'],
                    ['question' => 'Can you help improve my existing dissertation?', 'answer' => 'Absolutely. We specialise in refining existing drafts, improving methodology, and ensuring editorial polish.'],
                    ['question' => 'Do you follow UK university guidelines?', 'answer' => 'Yes, all our advisors are experts in UK Higher Education and will align your work strictly with your institution\'s specific rubric.'],
                ]
            ]
        ]);

        // SECTION I: Final CTA
        $service->sections()->create([
            'type' => 'cta',
            'sort_order' => 90,
            'is_active' => true,
            'content' => [
                'title' => 'Speak to an Expert Today',
                'text' => 'Get started now to receive urgent help or quick guidance for your terminal project.',
                'button_text' => 'Initiate Consultation',
                'button_link' => '#hero',
            ]
        ]);
    }
}

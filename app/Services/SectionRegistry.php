<?php

namespace App\Services;

class SectionRegistry
{
    /**
     * Get all available section types and their basic info.
     * These map strictly to the Stitch design library components.
     */
    public static function getAvailableSections(): array
    {
        return [
            'hero' => [
                'name' => 'Hero Section (Home)',
                'icon' => 'home',
                'description' => 'Main homepage opening with badge, title, and side image.',
                'editorial_hint' => 'Use this for the main landing experience. Keep the title punchy and under 10 words.',
                'preview_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2426&auto=format&fit=crop',
            ],
            'hero_about' => [
                'name' => 'Hero Section (About)',
                'icon' => 'history_edu',
                'description' => 'Legacy-focused opening with italic accents and glass cards.',
                'editorial_hint' => 'Ideal for storytelling and brand history.',
            ],
            'hero_side_form' => [
                'name' => 'Hero Section (Side Form)',
                'icon' => 'contact_page',
                'description' => 'Service-focused opening with a visible lead generation form.',
                'editorial_hint' => 'Best for high-conversion service pages. Displays the form prominently on the right.',
                'preview_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2670&auto=format&fit=crop',
            ],
            'mission_vision' => [
                'name' => 'Core Values (Bento)',
                'icon' => 'auto_stories',
                'description' => 'Asymmetric grid showing Mission, Vision, and commitment tags.',
                'editorial_hint' => 'Use this to establish brand authority and core promises.',
            ],
            'team_grid' => [
                'name' => 'Team Faculty Grid',
                'icon' => 'groups',
                'description' => 'Professional grid showing PhD consultants with portraits.',
                'editorial_hint' => 'Builds trust by showing real people. Use high-quality professional headshots.',
            ],
            'services_bento' => [
                'name' => 'Services Bento Grid',
                'icon' => 'view_quilt',
                'description' => 'Modern asymmetric grid for navigating to other services.',
                'editorial_hint' => 'Use 3-4 items for a balanced look. The dark card acts as a focal point.',
            ],
            'why_choose_us' => [
                'name' => 'Trust Benefit Pillars',
                'icon' => 'verified',
                'description' => 'Benefit highlights with a side image and success metric.',
                'editorial_hint' => 'Explain why students should choose you. Use strong icons and short card titles.',
            ],
            'feature_grid' => [
                'name' => 'Academic Standards Grid',
                'icon' => 'grid_view',
                'description' => 'Clean grid of cards with icons and color accents.',
                'editorial_hint' => 'Perfect for listing commitments, standards, or sub-services in a sleek grid.',
            ],
            'progress_ledger' => [
                'name' => 'Process Ledger (Timeline)',
                'icon' => 'format_list_numbered',
                'description' => 'Numbered workflow showing the academic journey.',
                'editorial_hint' => 'Keep steps concise. 3-4 steps is the ideal length for readability.',
            ],
            'cta_banner' => [
                'name' => 'Conversion Banner',
                'icon' => 'ads_click',
                'description' => 'In-page banner with dual buttons for quick action.',
                'editorial_hint' => 'Use this to break up long pages and drive users toward the contact page.',
            ],
            'stagger_testimonials' => [
                'name' => 'Staggered Success Stories',
                'icon' => 'reviews',
                'description' => 'Interactive overlapping card stack for testimonials.',
                'editorial_hint' => 'Use for social proof. Best with 3-5 high-impact quotes.',
            ],
            'faq_accordion' => [
                'name' => 'Inquiries & Clarifications',
                'icon' => 'quiz',
                'description' => 'Accordion-style list for common questions.',
                'editorial_hint' => 'Group related questions. Keep answers under 3 sentences for easy scanning.',
            ],
        ];
    }

    /**
     * Get the field schema for a specific section type.
     */
    public static function getSchema(string $type): array
    {
        $schemas = [
            'hero' => [
                'badge' => ['type' => 'text', 'label' => 'Badge Text (Gold)', 'default' => 'Research Excellence', 'hint' => 'A small label appearing at the very top.'],
                'title' => ['type' => 'text', 'label' => 'Main Headline', 'hint' => 'The largest text on the page.'],
                'title_accent' => ['type' => 'text', 'label' => 'Title Accent', 'hint' => 'Displays in a secondary color/italic style.'],
                'subtitle' => ['type' => 'textarea', 'label' => 'Supporting Text', 'hint' => 'Keep this between 2-3 lines for visual balance.'],
                'image_url' => ['type' => 'text', 'label' => 'Hero Image URL', 'placeholder' => '/storage/images/...'],
                'advisor_name' => ['type' => 'text', 'label' => 'Advisor Name', 'default' => 'Dr. Elena Vance'],
                'advisor_role' => ['type' => 'text', 'label' => 'Advisor Role', 'default' => 'Lead Research Strategist'],
                'advisor_quote' => ['type' => 'text', 'label' => 'Advisor Quote', 'hint' => 'A punchy one-liner from the advisor.'],
            ],
            'hero_side_form' => [
                'badge' => ['type' => 'text', 'label' => 'Elite Badge', 'default' => 'Scholarly Identity'],
                'title' => ['type' => 'text', 'label' => 'Strong Headline', 'hint' => 'Main hook for the service.'],
                'subtitle' => ['type' => 'textarea', 'label' => 'Persuasive Intro', 'hint' => 'Detail the problem you solve here.'],
                'image_url' => ['type' => 'text', 'label' => 'Background Visual URL', 'hint' => 'Faint academic image for depth.'],
                'form_title' => ['type' => 'text', 'label' => 'Form Box Title', 'default' => 'Reserve Your Consultant'],
                'form_subtitle' => ['type' => 'text', 'label' => 'Form Box Hint', 'default' => 'Personalized support for bespoke research.'],
                'form_button' => ['type' => 'text', 'label' => 'Conversion Button Text', 'default' => 'Initiate Consultation'],
                'cta_label' => ['type' => 'text', 'label' => 'Secondary Action Label', 'hint' => 'Small link text under the intro.'],
                'cta_link' => ['type' => 'text', 'label' => 'Secondary Action Link', 'default' => '#'],
            ],
            'why_choose_us' => [
                'heading' => ['type' => 'text', 'label' => 'Main Heading', 'default' => 'The Atelier Distinction'],
                'paragraph' => ['type' => 'textarea', 'label' => 'Intro Paragraph'],
                'image_url' => ['type' => 'text', 'label' => 'Side Image URL'],
                'stat_value' => ['type' => 'text', 'label' => 'Trust Stat (e.g. 98%)', 'default' => '99%'],
                'stat_label' => ['type' => 'text', 'label' => 'Stat Description', 'default' => 'Success Rate'],
                'highlights' => [
                    'type' => 'repeater',
                    'label' => 'Trust Pillars',
                    'fields' => [
                        'icon' => ['type' => 'text', 'label' => 'Material Icon', 'default' => 'verified'],
                        'title' => ['type' => 'text', 'label' => 'Pillar Title'],
                        'text' => ['type' => 'textarea', 'label' => 'Pillar Description', 'hint' => 'Explain this benefit in one short sentence.'],
                    ]
                ]
            ],
            'feature_grid' => [
                'heading' => ['type' => 'text', 'label' => 'Section Heading', 'default' => 'Standard of Excellence'],
                'paragraph' => ['type' => 'textarea', 'label' => 'Section Subtext'],
                'items' => [
                    'type' => 'repeater',
                    'label' => 'Feature Cards',
                    'fields' => [
                        'icon' => ['type' => 'text', 'label' => 'Material Icon', 'default' => 'verified'],
                        'title' => ['type' => 'text', 'label' => 'Card Title'],
                        'text' => ['type' => 'textarea', 'label' => 'Card Description'],
                        'is_primary' => ['type' => 'checkbox', 'label' => 'Dark Card? (Crimson)', 'default' => false],
                        'is_secondary' => ['type' => 'checkbox', 'label' => 'Accent Card? (Gold)', 'default' => false],
                    ]
                ]
            ],
            'progress_ledger' => [
                'heading' => ['type' => 'text', 'label' => 'Journey Title', 'default' => 'The Collaborative Path'],
                'paragraph' => ['type' => 'text', 'label' => 'Process Intro'],
                'steps' => [
                    'type' => 'repeater',
                    'label' => 'Process Steps',
                    'fields' => [
                        'number' => ['type' => 'text', 'label' => 'Step #', 'default' => '01'],
                        'title' => ['type' => 'text', 'label' => 'Step Label'],
                        'text' => ['type' => 'text', 'label' => 'Short Description'],
                    ]
                ]
            ],
            'faq_accordion' => [
                'heading' => ['type' => 'text', 'label' => 'Accordion Heading', 'default' => 'Inquiries & Clarifications'],
                'items' => [
                    'type' => 'repeater',
                    'label' => 'FAQ Entries',
                    'fields' => [
                        'question' => ['type' => 'text', 'label' => 'The Question'],
                        'answer' => ['type' => 'textarea', 'label' => 'The Answer', 'hint' => 'Be concise and reassuring.'],
                    ]
                ]
            ],
            'cta_banner' => [
                'heading' => ['type' => 'text', 'label' => 'Headline', 'default' => 'Begin Your Masterpiece'],
                'paragraph' => ['type' => 'textarea', 'label' => 'Persuasive Text'],
                'cta_primary_label' => ['type' => 'text', 'label' => 'Main Button', 'default' => 'Consult an Advisor'],
                'cta_secondary_label' => ['type' => 'text', 'label' => 'Support Button', 'default' => 'Review Portfolio'],
            ],
            'stagger_testimonials' => [
                'heading' => ['type' => 'text', 'label' => 'Success Heading', 'default' => 'Scholarly Stories'],
                'paragraph' => ['type' => 'textarea', 'label' => 'Success Intro'],
                'items' => [
                    'type' => 'repeater',
                    'label' => 'Testimonial Cards',
                    'fields' => [
                        'name' => ['type' => 'text', 'label' => 'Scholar Name'],
                        'role' => ['type' => 'text', 'label' => 'Academic Major'],
                        'quote' => ['type' => 'textarea', 'label' => 'The Experience', 'hint' => 'Highlight results like grade improvement or timely submission.'],
                        'image' => ['type' => 'text', 'label' => 'Avatar URL'],
                    ]
                ]
            ],
        ];

        return $schemas[$type] ?? [];
    }
}

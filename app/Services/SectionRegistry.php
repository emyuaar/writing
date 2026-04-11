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
                'description' => 'Main homepage hero with badge, title, subtitle, and side image.',
            ],
            'hero_about' => [
                'name' => 'Hero Section (About)',
                'icon' => 'history_edu',
                'description' => 'About page hero with story-focused layout and glass card.',
            ],
            'mission_vision' => [
                'name' => 'Mission & Vision (Bento)',
                'icon' => 'auto_stories',
                'description' => 'Asymmetric grid showing Mission, Vision, and core values.',
            ],
            'team_grid' => [
                'name' => 'Team Faculty Grid',
                'icon' => 'groups',
                'description' => 'Grid showing PhD consultants with portraits and bios.',
            ],
            'services_bento' => [
                'name' => 'Services Bento Grid',
                'icon' => 'view_quilt',
                'description' => 'Bento-style grid for showing services with icons and links.',
            ],
            'why_choose_us' => [
                'name' => 'Why Choose Us',
                'icon' => 'verified',
                'description' => 'Distinction highlights with image and approval rate badge.',
            ],
            'progress_ledger' => [
                'name' => 'Process Ledger (Timeline)',
                'icon' => 'format_list_numbered',
                'description' => 'Numbered steps showing the academic journey.',
            ],
            'cta_banner' => [
                'name' => 'Call to Action Banner',
                'icon' => 'ads_click',
                'description' => 'Full-width banner with primary and secondary buttons.',
            ],
            'pricing_cards' => [
                'name' => 'Pricing Cards',
                'icon' => 'payments',
                'description' => 'Three-column pricing tiers with feature lists.',
            ],
            'comparison_table' => [
                'name' => 'Feature Comparison Table',
                'icon' => 'table_view',
                'description' => 'Detailed breakdown of service features across tiers.',
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
                'badge' => ['type' => 'text', 'label' => 'Badge Text (Gold)', 'default' => 'Premium Academic Excellence'],
                'title' => ['type' => 'text', 'label' => 'Main Title', 'default' => 'Expert Dissertation Help'],
                'title_accent' => ['type' => 'text', 'label' => 'Title Accent (Crimson)', 'default' => 'You Can Trust'],
                'subtitle' => ['type' => 'textarea', 'label' => 'Subtitle', 'default' => 'Navigate the complexities of doctoral research...'],
                'cta_primary_label' => ['type' => 'text', 'label' => 'Primary Button Label', 'default' => 'Get Started'],
                'cta_primary_link' => ['type' => 'text', 'label' => 'Primary Button Link', 'default' => '#'],
                'cta_secondary_label' => ['type' => 'text', 'label' => 'Secondary Button Label', 'default' => 'Get Free Quote'],
                'cta_secondary_link' => ['type' => 'text', 'label' => 'Secondary Button Link', 'default' => '#'],
                'image_url' => ['type' => 'text', 'label' => 'Main Image URL', 'placeholder' => 'https://...'],
                'advisor_name' => ['type' => 'text', 'label' => 'Glass Card: Advisor Name', 'default' => 'Dr. Elena Vance'],
                'advisor_role' => ['type' => 'text', 'label' => 'Glass Card: Advisor Role', 'default' => 'Lead Research Strategist'],
                'advisor_quote' => ['type' => 'text', 'label' => 'Glass Card: Quote', 'default' => '"Our mission is to refine your vision..."'],
                'advisor_image' => ['type' => 'text', 'label' => 'Glass Card: Image URL'],
            ],
            'hero_about' => [
                'badge' => ['type' => 'text', 'label' => 'Badge Text', 'default' => 'Our Legacy'],
                'title' => ['type' => 'text', 'label' => 'Title Part 1', 'default' => 'Elevating Research into'],
                'title_italic' => ['type' => 'text', 'label' => 'Title Part 2 (Italic)', 'default' => 'Scholarly Art.'],
                'subtitle' => ['type' => 'textarea', 'label' => 'Subtitle'],
                'image_url' => ['type' => 'text', 'label' => 'Main Image URL'],
                'stat_label' => ['type' => 'text', 'label' => 'Glass Card: Label', 'default' => '150+ Ph.D. Theses'],
                'stat_text' => ['type' => 'text', 'label' => 'Glass Card: Text', 'default' => 'Guided from initial inquiry...'],
            ],
            'mission_vision' => [
                'mission_title' => ['type' => 'text', 'label' => 'Mission Title', 'default' => 'Our Mission'],
                'mission_text' => ['type' => 'textarea', 'label' => 'Mission Text'],
                'mission_tags' => ['type' => 'text', 'label' => 'Mission Tags (Comma separated)', 'default' => 'Precision, Authority, Integrity'],
                'vision_title' => ['type' => 'text', 'label' => 'Vision Title', 'default' => 'Our Vision'],
                'vision_text' => ['type' => 'textarea', 'label' => 'Vision Text'],
                'vision_quote' => ['type' => 'text', 'label' => 'Vision Quote', 'default' => '"The pursuit of knowledge is a craft..."'],
            ],
            'team_grid' => [
                'badge' => ['type' => 'text', 'label' => 'Small Badge', 'default' => 'Architects of Thought'],
                'heading' => ['type' => 'text', 'label' => 'Heading', 'default' => 'Meet the Distinguished Faculty'],
                'paragraph' => ['type' => 'textarea', 'label' => 'Paragraph'],
                'members' => [
                    'type' => 'repeater',
                    'label' => 'Team Members',
                    'fields' => [
                        'name' => ['type' => 'text', 'label' => 'Name'],
                        'role' => ['type' => 'text', 'label' => 'Role'],
                        'image' => ['type' => 'text', 'label' => 'Image URL'],
                        'bio' => ['type' => 'textarea', 'label' => 'Short Bio'],
                    ]
                ]
            ],
            'services_bento' => [
                'heading' => ['type' => 'text', 'label' => 'Section Heading', 'default' => 'Our Services'],
                'items' => [
                    'type' => 'repeater',
                    'label' => 'Services Blocks',
                    'fields' => [
                        'icon' => ['type' => 'text', 'label' => 'Material Icon Name', 'default' => 'history_edu'],
                        'title' => ['type' => 'text', 'label' => 'Title'],
                        'text' => ['type' => 'textarea', 'label' => 'Description'],
                        'link_label' => ['type' => 'text', 'label' => 'Link Label (e.g. Learn More)', 'default' => 'Explore Service'],
                        'link' => ['type' => 'text', 'label' => 'Link URL', 'default' => '#'],
                        'button_label' => ['type' => 'text', 'label' => 'Button Label (For Dark Card)', 'default' => 'Priority Support'],
                        'is_dark' => ['type' => 'checkbox', 'label' => 'Dark Theme?', 'default' => false],
                    ]
                ]
            ],
            'why_choose_us' => [
                'heading' => ['type' => 'text', 'label' => 'Heading', 'default' => 'The Scholarly Distinction'],
                'paragraph' => ['type' => 'textarea', 'label' => 'Secondary Paragraph'],
                'image_url' => ['type' => 'text', 'label' => 'Side Image URL'],
                'stat_value' => ['type' => 'text', 'label' => 'Stat Value', 'default' => '98%'],
                'stat_label' => ['type' => 'text', 'label' => 'Stat Label', 'default' => 'Approval Rate'],
                'highlights' => [
                    'type' => 'repeater',
                    'label' => 'Highlights',
                    'fields' => [
                        'icon' => ['type' => 'text', 'label' => 'Icon Name', 'default' => 'groups'],
                        'title' => ['type' => 'text', 'label' => 'Title'],
                        'text' => ['type' => 'text', 'label' => 'Small Text'],
                    ]
                ]
            ],
            'progress_ledger' => [
                'heading' => ['type' => 'text', 'label' => 'Heading', 'default' => 'Your Path to Excellence'],
                'paragraph' => ['type' => 'text', 'label' => 'Subheading', 'default' => 'A transparent, four-step journey...'],
                'steps' => [
                    'type' => 'repeater',
                    'label' => 'Steps',
                    'fields' => [
                        'number' => ['type' => 'text', 'label' => 'Step Number or Icon', 'default' => '1'],
                        'title' => ['type' => 'text', 'label' => 'Step Title'],
                        'text' => ['type' => 'text', 'label' => 'Step Description'],
                    ]
                ]
            ],
            'cta_banner' => [
                'heading' => ['type' => 'text', 'label' => 'Heading', 'default' => 'Begin Your Masterpiece'],
                'paragraph' => ['type' => 'textarea', 'label' => 'Paragraph'],
                'cta_primary_label' => ['type' => 'text', 'label' => 'Primary Button Label', 'default' => 'Consult with an Advisor'],
                'cta_primary_link' => ['type' => 'text', 'label' => 'Primary Button Link', 'default' => '#'],
                'cta_secondary_label' => ['type' => 'text', 'label' => 'Secondary Button Label', 'default' => 'Review Portfolio'],
                'cta_secondary_link' => ['type' => 'text', 'label' => 'Secondary Button Link', 'default' => '#'],
            ],
            'testimonials' => [
                'heading' => ['type' => 'text', 'label' => 'Heading', 'default' => 'Academic Success Stories'],
                'paragraph' => ['type' => 'text', 'label' => 'Subtext'],
                'items' => [
                    'type' => 'repeater',
                    'label' => 'Testimonials (Optional Manual)',
                    'fields' => [
                        'name' => ['type' => 'text', 'label' => 'Student Name'],
                        'role' => ['type' => 'text', 'label' => 'Field/Major'],
                        'text' => ['type' => 'textarea', 'label' => 'Testimonial Body'],
                        'rating' => ['type' => 'text', 'label' => 'Rating (1-5)', 'default' => '5'],
                    ]
                ]
            ],
            'faq_accordion' => [
                'heading' => ['type' => 'text', 'label' => 'Heading', 'default' => 'Inquiries & Clarifications'],
                'items' => [
                    'type' => 'repeater',
                    'label' => 'FAQ Items',
                    'fields' => [
                        'question' => ['type' => 'text', 'label' => 'Question'],
                        'answer' => ['type' => 'textarea', 'label' => 'Answer'],
                    ]
                ]
            ],
            'pricing_cards' => [
              'heading' => ['type' => 'text', 'label' => 'Section Heading', 'default' => 'Investment Tiers'],
              'paragraph' => ['type' => 'textarea', 'label' => 'Subtext'],
              'availability_text' => ['type' => 'text', 'label' => 'Availability Badge', 'default' => 'Limited Availability for Q3 Intake'],
              'cards' => [
                  'type' => 'repeater',
                  'label' => 'Price Cards',
                  'fields' => [
                      'name' => ['type' => 'text', 'label' => 'Plan Name', 'default' => 'Scholarly Elite'],
                      'price' => ['type' => 'text', 'label' => 'Price', 'default' => '$199'],
                      'description' => ['type' => 'text', 'label' => 'Short Description'],
                      'features' => ['type' => 'textarea', 'label' => 'Features (one per line)'],
                      'is_featured' => ['type' => 'checkbox', 'label' => 'Highlight this card?'],
                      'button_label' => ['type' => 'text', 'label' => 'Button Text', 'default' => 'Hire an Advisor'],
                      'button_link' => ['type' => 'text', 'label' => 'Button Link', 'default' => '#'],
                  ]
              ]
            ],
        ];

        return $schemas[$type] ?? [];
    }
}

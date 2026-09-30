<?php

/*
|--------------------------------------------------------------------------
| Application Constants
|--------------------------------------------------------------------------
|
| Central place for enum-like values used across the app.
| Access via config('constants.<group>.<key>') e.g. config('constants.highlights.types').
| Format: 'db_value' => 'Display Label' — usable directly in admin dropdowns.
|
*/

return [

    /*
    |-------------------------------------------------------------------
    | Highlights
    |-------------------------------------------------------------------
    */
    'highlights' => [
        'types' => [
            'image' => 'Image',
            'video' => 'Video',
        ],
        'tags' => [
            'highlight' => 'Highlight',
            'conical_shoot' => 'Conical Shoot',
            'featured' => 'Featured',
            'trending' => 'Trending',
            'recent' => 'Recent Work',
            'commercial' => 'Commercial',
        ],
        'statuses' => [
            'active' => 'Active',
            'inactive' => 'Inactive',
            'draft' => 'Draft',
        ],
    ],

    /*
    |-------------------------------------------------------------------
    | FAQs
    |-------------------------------------------------------------------
    */
    'faqs' => [
        'categories' => [
            'General' => 'General',
            'Weddings' => 'Weddings',
            'Services' => 'Services',
            'Commercial' => 'Commercial',
            'Booking' => 'Booking',
            'Delivery' => 'Delivery',
            'Pricing' => 'Pricing',
        ],
    ],

    /*
    |-------------------------------------------------------------------
    | Enquiries / Leads
    |-------------------------------------------------------------------
    */
    'enquiries' => [
        'statuses' => [
            'new' => 'New',
            'contacted' => 'Contacted',
            'in_progress' => 'In Progress',
            'converted' => 'Converted',
            'closed' => 'Closed',
            'spam' => 'Spam',
        ],
    ],

    /*
    |-------------------------------------------------------------------
    | Testimonials
    |-------------------------------------------------------------------
    */
    'testimonials' => [
        'statuses' => [
            'pending' => 'Pending',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
        ],
    ],

    /*
    |-------------------------------------------------------------------
    | Services / Project Types (used in Contact Form + Services module)
    |-------------------------------------------------------------------
    */
    'services' => [
        'types' => [
            'Wedding' => 'Wedding',
            'Pre-Wedding' => 'Pre-Wedding',
            'Event' => 'Event',
            'Corporate' => 'Corporate',
            'Commercial / Brand' => 'Commercial / Brand',
            'Fashion' => 'Fashion',
            'Real Estate' => 'Real Estate',
            'Interior Design' => 'Interior Design',
            'Content Creation' => 'Content Creation',
            'Other' => 'Other',
        ],
    ],

    /*
    |-------------------------------------------------------------------
    | Media
    |-------------------------------------------------------------------
    */
    'media' => [
        'image_mimes' => 'jpeg,png,jpg,gif,svg,webp',
        'video_mimes' => 'mp4,mov,avi,wmv,webm',
        'max_image_size_kb' => 2048,   // 2 MB
        'max_video_size_kb' => 51200,  // 50 MB
    ],

    /*
    |-------------------------------------------------------------------
    | Generic Statuses (reusable boolean-style flags)
    |-------------------------------------------------------------------
    */
    'general' => [
        'active_states' => [
            1 => 'Active',
            0 => 'Inactive',
        ],
        'yes_no' => [
            1 => 'Yes',
            0 => 'No',
        ],
    ],

    /*
    |-------------------------------------------------------------------
    | Pagination Defaults
    |-------------------------------------------------------------------
    */
    'pagination' => [
        'default' => 10,
        'admin' => 15,
        'public' => 12,
    ],

];

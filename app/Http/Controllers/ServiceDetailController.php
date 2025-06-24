<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceDetailController extends Controller
{
    public function show($slug)
    {
        if ($slug === 'air-conditioner') {
            $serviceTitle = 'Air Conditioner Services';
            $includes = [
                'Indoor & outdoor unit cleaning',
                'High-pressure foam jet treatment',
                'Free gas check-up',
            ];

            $steps = [
                'Inspection & protective covering',
                'Foam & jet cleaning',
                'Drain tray and pipe check',
                'Area cleanup after servicing',
            ];

            $serviceGroups = [
                'Foam Jet Cleaning Service' => [
                    ['label' => '1 AC Cleaning', 'price' => 549, 'image' => 'ac1.jpg'],
                    ['label' => '2 ACs Cleaning', 'price' => 1049, 'image' => 'ac2.png'],
                    ['label' => '3 ACs Cleaning', 'price' => 1400, 'image' => 'ac3.png'],
                    ['label' => '4 ACs Cleaning', 'price' => 1900, 'image' => 'ac4.png'],
                    ['label' => '5 ACs Cleaning', 'price' => 2400, 'image' => 'ac5.png'],
                    ['label' => 'Lite AC Service', 'price' => 449, 'image' => 'ac-lite.png'],
                ],
                'AC Repair & Gas Refill Services' => [
                    ['label' => 'Low/No Cooling Repair', 'price' => 249, 'image' => 'repair1.png'],
                    ['label' => 'Power Issue Repair', 'price' => 249, 'image' => 'repair2.png'],
                    ['label' => 'Noise/Smell Issue Repair', 'price' => 449, 'image' => 'repair3.png'],
                    ['label' => 'Water Leakage Repair', 'price' => 599, 'image' => 'repair4.png'],
                    ['label' => 'Gas Leak Repair & Refill', 'price' => 2599, 'image' => 'repair5.png'],
                ],
                'AC Installation & Uninstallation' => [
                    ['label' => 'Split AC Installation', 'price' => 1599, 'image' => 'install1.png'],
                    ['label' => 'Window AC Installation', 'price' => 999, 'image' => 'install2.png'],
                    ['label' => 'Split AC Uninstallation', 'price' => 799, 'image' => 'install3.png'],
                    ['label' => 'Window AC Uninstallation', 'price' => 599, 'image' => 'install4.png'],
                ]
                
            ];

            return view('services.dynamic', compact('serviceTitle', 'serviceGroups', 'includes', 'steps'));
        }

        elseif ($slug === 'washing-machine') {
        $serviceTitle = 'Washing Machine Services';

        $includes = [
            'Check-Up: In-depth machine inspection and issue diagnosis',
            'Spare Part Sourcing: If required, parts are procured from local suppliers',
            'Repair: Faults are professionally repaired',
            'Post-Repair Cleaning: Full area and machine clean-up after service',
            'Payment: Final payment after deducting the booking fee',
        ];

        $steps = [
            'Select your service issue or installation type',
            'Choose a preferred date and time',
            'Professional visits and performs the service',
        ];

        $serviceGroups = [
            'Diagnostic & Repair Services' => [
                ['label' => 'Diagnostic Check-Up', 'price' => 99, 'image' => 'wm-diagnose.jpeg'],

                ['label' => 'Fully Automatic – Noise Issue', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['label' => 'Fully Automatic – Power Issue', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['label' => 'Fully Automatic – Not Spinning/Washing', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['label' => 'Fully Automatic – Draining Issue', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['label' => 'Fully Automatic – Error Display', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['label' => 'Fully Automatic – Unknown Issue', 'price' => 99, 'image' => 'wm-full-auto.png'],

                ['label' => 'Semi-Automatic – Noise Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['label' => 'Semi-Automatic – Power Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['label' => 'Semi-Automatic – Not Spinning/Washing', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['label' => 'Semi-Automatic – Draining Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['label' => 'Semi-Automatic – Error Display', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['label' => 'Semi-Automatic – Unknown Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['label' => 'Semi-Automatic – Water leakage Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
            ],
            'Installation & Uninstallation' => [
                ['label' => 'Installation – Fully Automatic Top Load', 'price' => 349, 'image' => 'wm-install.png'],
                ['label' => 'Installation – Fully Automatic Front Load', 'price' => 349, 'image' => 'wm-install.png'],
                ['label' => 'Installation – Semi-Automatic', 'price' => 349, 'image' => 'wm-install.png'],

                ['label' => 'Uninstallation – Fully Automatic Top Load', 'price' => 349, 'image' => 'wm-uninstall.png'],
                ['label' => 'Uninstallation – Fully Automatic Front Load', 'price' => 349, 'image' => 'wm-uninstall.png'],
                ['label' => 'Uninstallation – Semi-Automatic', 'price' => 349, 'image' => 'wm-uninstall.png'],
            ],
        ];

        return view('services.dynamic', compact('serviceTitle', 'serviceGroups', 'includes', 'steps'));
    }

    elseif ($slug === 'air-cooler-services') {
    $serviceTitle = 'Air Cooler Services';

    $includes = [
        'Full inspection of electrical and mechanical components',
        'Diagnosis of issues affecting performance',
        'Expert repair quote provided on the spot',
        'Complete internal & external cleaning',
        'Descaling of the pump and cooler base',
        'Cleaning of fan blades and water tank',
        'Area cleanup post-service',
    ];

    $steps = [
        'Check-Up: Detailed inspection by technician',
        'Spare Parts (If Needed): Approved & locally sourced',
        'Repair: Conducted efficiently on-site',
        'Post-Repair Cleaning: Spotless finish',
    ];

    $serviceGroups = [
        'Air Cooler Diagnostic Services' => [
            ['label' => 'Air Cooler Check-Up', 'price' => 249, 'image' => 'cooler-checkup.jpg'],
        ],
        'Air Cooler Full Cleaning Services' => [
            ['label' => 'Air Cooler Full Service', 'price' => 549, 'image' => 'cooler-full-service.jpg'],
        ],
    ];

    return view('services.dynamic', compact('serviceTitle', 'serviceGroups', 'includes', 'steps'));
}

elseif ($slug === 'geyser-services') {
    $serviceTitle = 'Geyser Services';

    $includes = [
        'Full system diagnostic & functionality check',
        'Leak, heating & performance inspection',
        'Descaling and element cleaning',
        'Expert repair quote on the spot',
        'Post-service clean-up',
    ];

    $steps = [
        'Check-Up: Certified technician inspects your geyser',
        'Spare Part Sourcing (if required): Technician arranges locally',
        'Repair: Done on approval',
        'Element Cleaning: Heating rod cleaned & tested',
        'Post-Repair Cleaning: Final clean-up',
        'Payment: After deducting booking fee',
    ];

    $serviceGroups = [
        'Check-Up Services' => [
            ['label' => 'Geyser Check-Up', 'price' => 199, 'image' => 'geyser-checkup.png'],
        ],
        'Full Service Packages' => [
            ['label' => 'Up to 10 Litres – Full Service', 'price' => 549, 'image' => 'geyser-service-10l.png'],
            ['label' => '11 to 25 Litres – Full Service', 'price' => 599, 'image' => 'geyser-service-25l.png'],
            ['label' => 'More than 25 Litres – Full Service', 'price' => 649, 'image' => 'geyser-service-40l.png'],
        ],
        'Installation & Uninstallation' => [
            ['label' => 'Geyser Installation', 'price' => 449, 'image' => 'geyser-install.png'],
            ['label' => 'Geyser Uninstallation', 'price' => 349, 'image' => 'geyser-uninstall.png'],
        ],
    ];

    return view('services.dynamic', compact('serviceTitle', 'serviceGroups', 'includes', 'steps'));
}

elseif ($slug === 'inverter-stabilizer') {
    $serviceTitle = 'Inverter & Stabilizer Services';

    $includes = [
        'Reliable power backup & protection',
        'Professional installation, maintenance, & repair',
        'Inverter and stabilizer safety & efficiency check',
    ];

    $steps = [
        'Consultation – Share your power requirements',
        'Expert Visit – Technicians inspect, install, or repair',
        'Service Execution – Clean, efficient, and hassle-free',
        'Testing & Confirmation – Ensure everything works smoothly',
        'Ongoing Support – For queries or follow-ups',
    ];

    $serviceGroups = [
        'Inverter Services' => [
            ['label' => 'Inverter Check-Up', 'price' => 150, 'image' => 'inverter-checkup.png'],
            ['label' => 'Inverter Servicing – Single Battery', 'price' => 399, 'image' => 'inverter-service-1.png'],
            ['label' => 'Inverter Servicing – Double Battery', 'price' => 499, 'image' => 'inverter-service-2.png'],
            ['label' => 'Inverter Servicing – Triple Battery', 'price' => 599, 'image' => 'inverter-service-3.png'],
            ['label' => 'Inverter Servicing – 4 or 6 Battery Setup', 'price' => 699, 'image' => 'inverter-service-4.png'],
            ['label' => 'Inverter Installation – Single Battery', 'price' => 375, 'image' => 'inverter-install-1.png'],
            ['label' => 'Inverter Installation – Double Battery', 'price' => 450, 'image' => 'inverter-install-2.png'],
            ['label' => 'Inverter Uninstallation', 'price' => 449, 'image' => 'inverter-uninstall.png'],
            ['label' => 'Inverter Fuse Replacement', 'price' => 129, 'image' => 'inverter-fuse.png'],
        ],

        'Stabilizer Services' => [
            ['label' => 'Stabilizer Installation', 'price' => 349, 'image' => 'stabilizer-install.png'],
            ['label' => 'Stabilizer Uninstallation', 'price' => 249, 'image' => 'stabilizer-uninstall.png'],
        ],
    ];

    return view('services.dynamic', compact('serviceTitle', 'serviceGroups', 'includes', 'steps'));
}

elseif ($slug === 'television') {
    $serviceTitle = 'Television Services';

    $includes = [
        'Expert repairs for display, sound, and power issues',
        'TV installation and uninstallation',
        'Final cleaning post-service',
    ];

    $steps = [
        'Book a check-up or installation service',
        'Technician visits and performs diagnosis/installation',
        'Quote provided post-diagnosis (₹199 adjusted in final bill)',
        'Repair with genuine parts (if approved)',
        'Clean-up after service',
    ];

    $serviceGroups = [
        'TV Repair Services – ₹199 Inspection Fee' => [
            ['label' => 'Display Issues', 'price' => 199, 'image' => 'tv-display.png'],
            ['label' => 'Power Issues', 'price' => 199, 'image' => 'tv-power.png'],
            ['label' => 'Buzzing or Cracking Sound', 'price' => 199, 'image' => 'tv-sound.png'],
            ['label' => 'Partial/No Display', 'price' => 199, 'image' => 'tv-partial-display.png'],
            ['label' => 'Color Distortion', 'price' => 199, 'image' => 'tv-color.png'],
            ['label' => 'Low/No Sound', 'price' => 199, 'image' => 'tv-nosound.png'],
            ['label' => 'Flickering/Blurred Image', 'price' => 199, 'image' => 'tv-flicker.png'],
            ['label' => 'Glitch Lines on Screen', 'price' => 199, 'image' => 'tv-glitch.png'],
            ['label' => 'Unknown Issues', 'price' => 199, 'image' => 'tv-unknown.png'],
        ],
        'TV Wall-Mount Installation' => [
            ['label' => 'Up to 26”', 'price' => 299, 'image' => 'tv-install-26.png'],
            ['label' => '32” to 43”', 'price' => 549, 'image' => 'tv-install-43.png'],
            ['label' => '46” to 55”', 'price' => 599, 'image' => 'tv-install-55.png'],
            ['label' => '65” and above', 'price' => 799, 'image' => 'tv-install-65.png'],
        ],
        'TV Uninstallation' => [
            ['label' => 'Up to 46”', 'price' => 299, 'image' => 'tv-uninstall-46.png'],
            ['label' => '46” to 55”', 'price' => 349, 'image' => 'tv-uninstall-55.png'],
            ['label' => '65” and above', 'price' => 549, 'image' => 'tv-uninstall-65.png'],
        ]
    ];

    return view('services.dynamic', compact('serviceTitle', 'serviceGroups', 'includes', 'steps'));
}
 
elseif ($slug === 'laptop') {
    $serviceTitle = 'Laptop & MacBook Services';

    $includes = [
        'On-site checkup and repair for Windows Laptops and MacBooks',
        'Upgrades like SSD/RAM, thermal paste service, and deep cleaning',
        'Service warranty up to 90 days'
    ];

    $steps = [
        'Technician visits your home/office with required tools',
        'Performs diagnostic check-up for only ₹125',
        'Approval-based repair/upgrade with transparent pricing',
        'Deep service or component upgrade as required',
        'Post-repair cleanup and warranty offered'
    ];

    $serviceGroups = [
        'Quick Visit / Check-Up – ₹125' => [
            ['label' => 'Windows Laptop Visit', 'price' => 125, 'image' => 'laptop-check.png'],
            ['label' => 'MacBook Visit', 'price' => 125, 'image' => 'macbook-check.png'],
        ],
        'Device Diagnostics – ₹125' => [
            ['label' => 'Software/OS Issues', 'price' => 125, 'image' => 'issue-software.png'],
            ['label' => 'Charging/Power Issue', 'price' => 125, 'image' => 'issue-power.png'],
            ['label' => 'Display Problem', 'price' => 125, 'image' => 'issue-display.png'],
            ['label' => 'Keyboard/Touchpad Fault', 'price' => 125, 'image' => 'issue-keyboard.png'],
            ['label' => 'Overheating', 'price' => 125, 'image' => 'issue-overheat.png'],
            ['label' => 'Internet/Camera Issue', 'price' => 125, 'image' => 'issue-internet.png'],
        ],
        'Deep Service – Starting ₹549' => [
            ['label' => 'Windows Laptop Deep Service', 'price' => 549, 'image' => 'laptop-service.png'],
            ['label' => 'MacBook Deep Service', 'price' => 549, 'image' => 'macbook-service.png'],
            ['label' => 'Gaming Laptop Service', 'price' => 899, 'image' => 'gaming-laptop.png'],
        ],
        'Upgrades – Starting ₹125' => [
            ['label' => 'Windows RAM Upgrade', 'price' => 125, 'image' => 'ram-upgrade.png'],
            ['label' => 'MacBook RAM Upgrade', 'price' => 125, 'image' => 'ram-upgrade.png'],
            ['label' => 'Windows HDD/SSD Upgrade', 'price' => 125, 'image' => 'hdd-upgrade.png'],
            ['label' => 'MacBook HDD/SSD Upgrade', 'price' => 125, 'image' => 'ssd-upgrade.png'],
        ],
        'Component Installation' => [
            ['label' => 'SSD / HDD Install', 'price' => 529, 'image' => 'ssd-install.png'],
            ['label' => 'RAM Install', 'price' => 529, 'image' => 'ram-install.png'],
            ['label' => 'Graphics Card Install', 'price' => 529, 'image' => 'gpu-install.png'],
        ],
        'System Setup' => [
            ['label' => 'OS Installation & Setup', 'price' => 125, 'image' => 'os-setup.png'],
        ]
    ];

    return view('services.dynamic', compact('serviceTitle', 'serviceGroups', 'includes', 'steps'));
}

elseif ($slug === 'desktop') {
    $serviceTitle = 'Desktop Services';

    $includes = [
        'In-home repair and maintenance for all Desktop PCs',
        'Upgrades including RAM, HDD/SSD, and graphics installation',
        'Cleaning and system optimization for better performance'
    ];

    $steps = [
        'Book a check-up for ₹125',
        'Technician visits and diagnoses',
        'Transparent repair or upgrade quote',
        'Repair/upgrade executed with original parts',
        'System is cleaned and tested before handover'
    ];

    $serviceGroups = [
        'Quick Visit / Check-Up – ₹125' => [
            ['label' => 'Desktop Visit', 'price' => 125, 'image' => 'desktop-check.png'],
        ],
        'Issue Diagnostics – ₹125' => [
            ['label' => 'System Lag / Hanging', 'price' => 125, 'image' => 'issue-lag.png'],
            ['label' => 'Physical Damage', 'price' => 125, 'image' => 'issue-damage.png'],
            ['label' => 'Port / Display Issues', 'price' => 125, 'image' => 'issue-port.png'],
            ['label' => 'Unknown Problem', 'price' => 125, 'image' => 'issue-unknown.png'],
        ],
        'Deep Service – ₹549' => [
            ['label' => 'Desktop Deep Cleaning & Optimization', 'price' => 549, 'image' => 'desktop-service.png'],
        ],
        'Upgrade Services – Starting ₹125' => [
            ['label' => 'RAM Upgrade', 'price' => 125, 'image' => 'ram-upgrade.png'],
            ['label' => 'Hard Disk Upgrade', 'price' => 125, 'image' => 'hdd-upgrade.png'],
        ],
        'Component Installation' => [
            ['label' => 'SSD Install', 'price' => 529, 'image' => 'ssd-install.png'],
            ['label' => 'Graphic Card Install', 'price' => 529, 'image' => 'gpu-install.png'],
        ],
        'System Setup' => [
            ['label' => 'Windows OS Setup & Install', 'price' => 125, 'image' => 'os-setup.png'],
        ]
    ];

    return view('services.dynamic', compact('serviceTitle', 'serviceGroups', 'includes', 'steps'));
}

elseif ($slug === 'chimney') {
    $serviceTitle = 'Chimney Cleaning Services';
    $includes = [
        'Inspection of flue and chimney for blockages',
        'Specialized internal cleaning using brushes, rods, and vacuums',
        'Clearing soot/creosote from all surfaces',
        'Safety verification after cleanup',
    ];
    $steps = [
        'Certified sweep checks for blockages',
        'Creosote removal with professional tools',
        'Full sweep of inner/exterior parts',
        'Chimney safety test & clearance',
    ];
    $serviceGroups = [
        'Chimney Cleaning' => [
            ['label' => 'Basic Chimney Cleaning', 'price' => 299, 'image' => 'chimney-clean.png'],
        ],
        'Combo Services' => [
            ['label' => 'Chimney + Stove Cleaning', 'price' => 369, 'image' => 'chimney-stove.png'],
        ],
    ];
    return view('services.dynamic', compact('serviceTitle', 'includes', 'steps', 'serviceGroups'));
}

elseif ($slug === 'stove') {
    $serviceTitle = 'Gas Stove & Hob Cleaning';
    $includes = [
        'Pipe, burner, ash trap and knob cleanup',
        'Inspection and cleaning of burner seal',
        'Ash and oil stain removal',
    ];
    $steps = [
        'Inspect internal pipes, burners & surface',
        'Clean and polish all parts with degreaser',
        'Final shine and hygiene check',
    ];
    $serviceGroups = [
        'Gas Stove Cleaning' => [
            ['label' => 'Gas Stove & Hob Cleaning', 'price' => 99, 'image' => 'stove-clean.png'],
        ]
    ];
    return view('services.dynamic', compact('serviceTitle', 'includes', 'steps', 'serviceGroups'));
}

elseif ($slug === 'kitchen-cleaning') {
    $serviceTitle = 'Complete Kitchen Cleaning';
    $includes = [
        'Surfaces & countertops disinfection and polish',
        'Appliance exteriors cleaned (fridge, microwave, stove)',
        'Sink scrubbing and floor mopping',
        'Cabinet exteriors wiped (interiors if applicable)',
    ];
    $steps = [
        'Assessment of kitchen and problem zones',
        'Deep surface treatment and stain removal',
        'Appliance polishing and external shine',
        'Sink & floor cleaning',
        'Final inspection and feedback',
    ];
    $serviceGroups = [
        'Kitchen Cleaning (Excl. Cabinet Interior)' => [
            ['label' => 'Kitchen Only', 'price' => 799, 'image' => 'kitchen-only.png'],
            ['label' => 'Kitchen + Chimney', 'price' => 1199, 'image' => 'kitchen-chimney.png'],
            ['label' => 'Kitchen + Fridge & Microwave', 'price' => 1399, 'image' => 'kitchen-fridge-micro.png'],
            ['label' => 'Kitchen + All Appliances', 'price' => 1799, 'image' => 'kitchen-all.png'],
        ],
        'Kitchen Cleaning (Incl. Cabinet Interior)' => [
            ['label' => 'Kitchen Only (With Interior)', 'price' => 1499, 'image' => 'kitchen-int-only.png'],
            ['label' => 'Kitchen + Chimney (With Interior)', 'price' => 1899, 'image' => 'kitchen-int-chimney.png'],
            ['label' => 'Kitchen + Fridge & Microwave (With Interior)', 'price' => 2049, 'image' => 'kitchen-int-fridge-micro.png'],
            ['label' => 'Kitchen + All Appliances (With Interior)', 'price' => 2449, 'image' => 'kitchen-int-all.png'],
        ],
    ];
    return view('services.dynamic', compact('serviceTitle', 'includes', 'steps', 'serviceGroups'));
}

elseif ($slug === 'microwave') {
    $serviceTitle = 'Microwave Cleaning (Add-On)';
    $includes = [
        'Interior degreasing and disinfection',
        'Exterior cleaning and stain removal',
        'Odor neutralization',
    ];
    $steps = [
        'Disassemble rotating tray',
        'Interior + exterior wiped with non-toxic cleaner',
        'Steam sanitized and dried',
    ];
    $serviceGroups = [
        'Microwave Cleaning' => [
            ['label' => 'Microwave Interior + Exterior Cleaning', 'price' => 199, 'image' => 'microwave-clean.png']
        ]
    ];
    return view('services.dynamic', compact('serviceTitle', 'includes', 'steps', 'serviceGroups'));
}

elseif ($slug === 'water-purifier') {
    return view('services.dynamic', [
        'serviceTitle' => 'Water Purifier Services',
        'serviceGroups' => [
            'Diagnostic & Cleaning Services' => [
                [
                    'label' => 'Water Purifier Check-Up',
                    'price' => 199,
                    'image' => 'water-purifier.jfif',
                ],
                [
                    'label' => 'Water Purifier Deep Cleaning',
                    'price' => 399,
                    'image' => 'water-purifier.jfif',
                ]
            ],
            'Benefits of Regular Maintenance' => [
                [
                    'label' => 'Improved Water Taste & Flow',
                    'price' => 299,
                    'image' => 'water-purifier.jfif',
                ],
                [
                    'label' => 'Increased Filter Life',
                    'price' => 299,
                    'image' => 'water-purifier.jfif',
                ]
            ]
        ]
    ]);
}

elseif ($slug === 'home-interior') {
    return view('services.dynamic', [
        'serviceTitle' => 'Interior Wall Painting (1BHK – Full)',
        'serviceGroups' => [
            'Fresh, Elegant Wall Finish by Experts' => [
                [
                    'label' => 'Interior Wall Painting (1BHK – Full)',
                    'price' => 3199,
                    'image' => 'wall-painting.jfif', // Make sure this image exists in /public/images/icons/
                ]
            ]
        ]
    ]);
}

elseif ($slug === 'designer-wallpaper-installation') {
    return view('services.dynamic', [
        'serviceTitle' => 'Designer Wallpaper Installation (Per Wall)',
        'serviceGroups' => [
            'Premium Wallpaper Installation by Experts' => [
                [
                    'label' => 'Designer Wallpaper Installation (Per Wall)',
                    'price' => 1049,
                    'image' => 'wallpaper.jfif', // Ensure this image exists in /public/images/icons/
                ]
            ]
        ]
    ]);
}


        abort(404);
    }
}

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
                    ['id' => 21,'label' => '1 AC Cleaning', 'price' => 549, 'image' => 'ac1.jpg'],
                    ['id' => 22,'label' => '2 ACs Cleaning', 'price' => 1049, 'image' => 'ac2.png'],
                    ['id' => 23,'label' => '3 ACs Cleaning', 'price' => 1400, 'image' => 'ac3.png'],
                    ['id' => 24,'label' => '4 ACs Cleaning', 'price' => 1900, 'image' => 'ac4.png'],
                    ['id' => 25,'label' => '5 ACs Cleaning', 'price' => 2400, 'image' => 'ac5.png'],
                    ['id' => 26,'label' => 'Lite AC Service', 'price' => 449, 'image' => 'ac-lite.png'],
                ],
                'AC Repair & Gas Refill Services' => [
                    ['id' => 27,'label' => 'Low/No Cooling Repair', 'price' => 249, 'image' => 'repair1.png'],
                    ['id' => 28,'label' => 'Power Issue Repair', 'price' => 249, 'image' => 'repair2.png'],
                    ['id' => 29,'label' => 'Noise/Smell Issue Repair', 'price' => 449, 'image' => 'repair3.png'],
                    ['id' => 30,'label' => 'Water Leakage Repair', 'price' => 599, 'image' => 'repair4.png'],
                    ['id' => 31,'label' => 'Gas Leak Repair & Refill', 'price' => 2599, 'image' => 'repair5.png'],
                ],
                'AC Installation & Uninstallation' => [
                    ['id' => 32,'label' => 'Split AC Installation', 'price' => 1599, 'image' => 'install1.png'],
                    ['id' => 33,'label' => 'Window AC Installation', 'price' => 999, 'image' => 'install2.png'],
                    ['id' => 34,'label' => 'Split AC Uninstallation', 'price' => 799, 'image' => 'install3.png'],
                    ['id' => 35,'label' => 'Window AC Uninstallation', 'price' => 599, 'image' => 'install4.png'],
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
                ['id' => 1, 'label' => 'Diagnostic Check-Up', 'price' => 99, 'image' => 'wm-diagnose.jpeg'],
                ['id' => 2, 'label' => 'Fully Automatic – Noise Issue', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['id' => 3, 'label' => 'Fully Automatic – Power Issue', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['id' => 4, 'label' => 'Fully Automatic – Not Spinning/Washing', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['id' => 5, 'label' => 'Fully Automatic – Draining Issue', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['id' => 6, 'label' => 'Fully Automatic – Error Display', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['id' => 7, 'label' => 'Fully Automatic – Unknown Issue', 'price' => 99, 'image' => 'wm-full-auto.png'],
                ['id' => 8, 'label' => 'Semi-Automatic – Noise Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['id' => 9, 'label' => 'Semi-Automatic – Power Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['id' => 10, 'label' => 'Semi-Automatic – Not Spinning/Washing', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['id' => 11, 'label' => 'Semi-Automatic – Draining Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['id' => 12, 'label' => 'Semi-Automatic – Error Display', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['id' => 13, 'label' => 'Semi-Automatic – Unknown Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
                ['id' => 14, 'label' => 'Semi-Automatic – Water leakage Issue', 'price' => 99, 'image' => 'wm-semi-auto.png'],
            ],
            'Installation & Uninstallation' => [
                ['id' => 15, 'label' => 'Installation – Fully Automatic Top Load', 'price' => 349, 'image' => 'wm-install.png'],
                ['id' => 16, 'label' => 'Installation – Fully Automatic Front Load', 'price' => 349, 'image' => 'wm-install.png'],
                ['id' => 17, 'label' => 'Installation – Semi-Automatic', 'price' => 349, 'image' => 'wm-install.png'],
                ['id' => 18, 'label' => 'Uninstallation – Fully Automatic Top Load', 'price' => 349, 'image' => 'wm-uninstall.png'],
                ['id' => 19, 'label' => 'Uninstallation – Fully Automatic Front Load', 'price' => 349, 'image' => 'wm-uninstall.png'],
                ['id' => 20, 'label' => 'Uninstallation – Semi-Automatic', 'price' => 349, 'image' => 'wm-uninstall.png'],
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
            ['id' => 33, 'label' => 'Air Cooler Check-Up', 'price' => 249, 'image' => 'cooler-checkup.jpg'],
        ],
        'Air Cooler Full Cleaning Services' => [
            ['id' => 34, 'label' => 'Air Cooler Full Service', 'price' => 549, 'image' => 'cooler-full-service.jpg'],
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
            ['id' => 35, 'label' => 'Geyser Check-Up', 'price' => 199, 'image' => 'geyser-checkup.png'],
        ],
        'Full Service Packages' => [
            ['id' => 36, 'label' => 'Up to 10 Litres – Full Service', 'price' => 549, 'image' => 'geyser-service-10l.png'],
            ['id' => 37, 'label' => '11 to 25 Litres – Full Service', 'price' => 599, 'image' => 'geyser-service-25l.png'],
            ['id' => 65, 'label' => 'More than 25 Litres – Full Service', 'price' => 649, 'image' => 'geyser-service-40l.png'],
        ],
        'Installation & Uninstallation' => [
            ['id' => 66, 'label' => 'Geyser Installation', 'price' => 449, 'image' => 'geyser-install.png'],
            ['id' => 67, 'label' => 'Geyser Uninstallation', 'price' => 349, 'image' => 'geyser-uninstall.png'],
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
                ['id' => 54, 'label' => 'Inverter Check-Up', 'price' => 150, 'image' => 'inverter-checkup.png'],
                ['id' => 55, 'label' => 'Inverter Servicing – Single Battery', 'price' => 399, 'image' => 'inverter-service-1.png'],
                ['id' => 56, 'label' => 'Inverter Servicing – Double Battery', 'price' => 499, 'image' => 'inverter-service-2.png'],
                ['id' => 57, 'label' => 'Inverter Servicing – Triple Battery', 'price' => 599, 'image' => 'inverter-service-3.png'],
                ['id' => 58, 'label' => 'Inverter Servicing – 4 or 6 Battery Setup', 'price' => 699, 'image' => 'inverter-service-4.png'],
                ['id' => 59, 'label' => 'Inverter Installation – Single Battery', 'price' => 375, 'image' => 'inverter-install-1.png'],
                ['id' => 60, 'label' => 'Inverter Installation – Double Battery', 'price' => 450, 'image' => 'inverter-install-2.png'],
                ['id' => 61, 'label' => 'Inverter Uninstallation', 'price' => 449, 'image' => 'inverter-uninstall.png'],
                ['id' => 62, 'label' => 'Inverter Fuse Replacement', 'price' => 129, 'image' => 'inverter-fuse.png'],
            ],
            'Stabilizer Services' => [
                ['id' => 63, 'label' => 'Stabilizer Installation', 'price' => 349, 'image' => 'stabilizer-install.png'],
                ['id' => 64, 'label' => 'Stabilizer Uninstallation', 'price' => 249, 'image' => 'stabilizer-uninstall.png'],
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
                ['id' => 38, 'label' => 'Display Issues', 'price' => 199, 'image' => 'tv-display.png'],
                ['id' => 39, 'label' => 'Power Issues', 'price' => 199, 'image' => 'tv-power.png'],
                ['id' => 40, 'label' => 'Buzzing or Cracking Sound', 'price' => 199, 'image' => 'tv-sound.png'],
                ['id' => 41, 'label' => 'Partial/No Display', 'price' => 199, 'image' => 'tv-partial-display.png'],
                ['id' => 42, 'label' => 'Color Distortion', 'price' => 199, 'image' => 'tv-color.png'],
                ['id' => 43, 'label' => 'Low/No Sound', 'price' => 199, 'image' => 'tv-nosound.png'],
                ['id' => 44, 'label' => 'Flickering/Blurred Image', 'price' => 199, 'image' => 'tv-flicker.png'],
                ['id' => 45, 'label' => 'Glitch Lines on Screen', 'price' => 199, 'image' => 'tv-glitch.png'],
                ['id' => 46, 'label' => 'Unknown Issues', 'price' => 199, 'image' => 'tv-unknown.png'],
            ],
            'TV Wall-Mount Installation' => [
                ['id' => 47, 'label' => 'Up to 26”', 'price' => 299, 'image' => 'tv-install-26.png'],
                ['id' => 48, 'label' => '32” to 43”', 'price' => 549, 'image' => 'tv-install-43.png'],
                ['id' => 49, 'label' => '46” to 55”', 'price' => 599, 'image' => 'tv-install-55.png'],
                ['id' => 50, 'label' => '65” and above', 'price' => 799, 'image' => 'tv-install-65.png'],
            ],
            'TV Uninstallation' => [
                ['id' => 51, 'label' => 'Up to 46”', 'price' => 299, 'image' => 'tv-uninstall-46.png'],
                ['id' => 52, 'label' => '46” to 55”', 'price' => 349, 'image' => 'tv-uninstall-55.png'],
                ['id' => 53, 'label' => '65” and above', 'price' => 549, 'image' => 'tv-uninstall-65.png'],
            ],
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
            ['id' => 68, 'label' => 'Windows Laptop Visit', 'price' => 125, 'image' => 'laptop-check.png'],
            ['id' => 69, 'label' => 'MacBook Visit', 'price' => 125, 'image' => 'macbook-check.png'],
        ],
        'Device Diagnostics – ₹125' => [
            ['id' => 70, 'label' => 'Software/OS Issues', 'price' => 125, 'image' => 'issue-software.png'],
            ['id' => 71, 'label' => 'Charging/Power Issue', 'price' => 125, 'image' => 'issue-power.png'],
            ['id' => 72, 'label' => 'Display Problem', 'price' => 125, 'image' => 'issue-display.png'],
            ['id' => 73, 'label' => 'Keyboard/Touchpad Fault', 'price' => 125, 'image' => 'issue-keyboard.png'],
            ['id' => 74, 'label' => 'Overheating', 'price' => 125, 'image' => 'issue-overheat.png'],
            ['id' => 75, 'label' => 'Internet/Camera Issue', 'price' => 125, 'image' => 'issue-internet.png'],
        ],
        'Deep Service – Starting ₹549' => [
            ['id' => 76, 'label' => 'Windows Laptop Deep Service', 'price' => 549, 'image' => 'laptop-service.png'],
            ['id' => 77, 'label' => 'MacBook Deep Service', 'price' => 549, 'image' => 'macbook-service.png'],
            ['id' => 78, 'label' => 'Gaming Laptop Service', 'price' => 899, 'image' => 'gaming-laptop.png'],
        ],
        'Upgrades – Starting ₹125' => [
            ['id' => 79, 'label' => 'Windows RAM Upgrade', 'price' => 125, 'image' => 'ram-upgrade.png'],
            ['id' => 80, 'label' => 'MacBook RAM Upgrade', 'price' => 125, 'image' => 'ram-upgrade.png'],
            ['id' => 81, 'label' => 'Windows HDD/SSD Upgrade', 'price' => 125, 'image' => 'hdd-upgrade.png'],
            ['id' => 82, 'label' => 'MacBook HDD/SSD Upgrade', 'price' => 125, 'image' => 'ssd-upgrade.png'],
        ],
        'Component Installation' => [
            ['id' => 83, 'label' => 'SSD / HDD Install', 'price' => 529, 'image' => 'ssd-install.png'],
            ['id' => 84, 'label' => 'RAM Install', 'price' => 529, 'image' => 'ram-install.png'],
            ['id' => 85, 'label' => 'Graphics Card Install', 'price' => 529, 'image' => 'gpu-install.png'],
        ],
        'System Setup' => [
            ['id' => 86, 'label' => 'OS Installation & Setup', 'price' => 125, 'image' => 'os-setup.png'],
        ],
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
            ['id' => 87, 'label' => 'Desktop Visit', 'price' => 125, 'image' => 'desktop-check.png'],
        ],
        'Issue Diagnostics – ₹125' => [
            ['id' => 88, 'label' => 'System Lag / Hanging', 'price' => 125, 'image' => 'issue-lag.png'],
            ['id' => 89, 'label' => 'Physical Damage', 'price' => 125, 'image' => 'issue-damage.png'],
            ['id' => 90, 'label' => 'Port / Display Issues', 'price' => 125, 'image' => 'issue-port.png'],
            ['id' => 91, 'label' => 'Unknown Problem', 'price' => 125, 'image' => 'issue-unknown.png'],
        ],
        'Deep Service – ₹549' => [
            ['id' => 92, 'label' => 'Desktop Deep Cleaning & Optimization', 'price' => 549, 'image' => 'desktop-service.png'],
        ],
        'Upgrade Services – Starting ₹125' => [
            ['id' => 93, 'label' => 'RAM Upgrade', 'price' => 125, 'image' => 'ram-upgrade.png'],
            ['id' => 94, 'label' => 'Hard Disk Upgrade', 'price' => 125, 'image' => 'hdd-upgrade.png'],
        ],
        'Component Installation' => [
            ['id' => 95, 'label' => 'SSD Install', 'price' => 529, 'image' => 'ssd-install.png'],
            ['id' => 96, 'label' => 'Graphic Card Install', 'price' => 529, 'image' => 'gpu-install.png'],
        ],
        'System Setup' => [
            ['id' => 97, 'label' => 'Windows OS Setup & Install', 'price' => 125, 'image' => 'os-setup.png'],
        ],
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

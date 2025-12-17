<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $companyName = $this->faker->unique()->company(); // مثل: "شركة الريادة للتكنولوجيا"
        $legalName   = $this->faker->boolean(70) ? $companyName : $companyName . ' ذ.م.م';

        return [
            'name'                  => $companyName,
            'legal_name'            => $legalName,
            'email'                 => $this->faker->unique()->companyEmail(),
            'phone'                 => $this->faker->phoneNumber(),
            'alternative_phone'     => $this->faker->optional(0.4)->phoneNumber(),
            'address'               => $this->faker->streetAddress(),
            'city'                  => $this->faker->city(),
            'country'               => $this->faker->randomElement(['السعودية', 'مصر', 'الإمارات', 'الأردن', 'قطر', 'الكويت', 'عمان', 'البحرين', 'لبنان']),
            'postal_code'           => $this->faker->postcode(),

            // لوجو عشوائي من موقع مجاني (يولد رابط صورة حقيقية)
            'logo'                  => 'https://api.dicebear.com/7.x/identicon/svg?seed=' . Str::random(10),

            'website'               => $this->faker->optional(0.8)->url(),
            'business_type'         => $this->faker->randomElement([
                'شركة ذات مسئولية محدودة',
                'شركة مساهمة',
                'مؤسسة فردية',
                'شراكة',
                'شركة شخص واحد'
            ]),
            'industry'              => $this->faker->randomElement([
                'تقنية المعلومات',
                'التجارة الإلكترونية',
                'التعليم',
                'الصحة',
                'العقارات',
                'السياحة والسفر',
                'التصنيع',
                'الخدمات المالية',
                'التسويق الرقمي',
                'اللوجستيات'
            ]),

            // سجل ضريبي وسجل تجاري واقعي (مصري/سعودي/إماراتي)
            'tax_id'                => $this->faker->regexify('[0-9]{10,15}'),
            'commercial_registration' => $this->faker->regexify('[0-9]{8,12}'),

            'is_active'             => $this->faker->boolean(80),
            'activated_at'          => function (array $attributes) {
                return $attributes['is_active'] ? $this->faker->dateTimeBetween('-2 years', 'now') : null;
            },

            'employees_count'       => $this->faker->numberBetween(3, 500),
            'notes'                 => $this->faker->optional(0.3)->realText(200),

            'created_at'            => $this->faker->dateTimeBetween('-2 years', '-1 month'),
            'updated_at'            => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}

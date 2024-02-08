<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            'Accountants', 'Advertising, Public Relations' , 'Aerospace, Air Transport, Air Transport Unions, Airlines', 'Agribusiness, Agricultural Services & Products, Agriculture', 'Alcoholic Beverages', 'Alternative Energy Production & Services', 'Architectural Services', 'Attorneys, Law Firms, Lawyers & Lobbyists, Legal Services', 'Auto Dealers, Auto Manufacturers, Automotive', 
            'Banking, Banks, Microfinance, Finance, Credit Companies, Credit Unions', 'Bars & Restaurants', 'Books, Magazines & Newspapers', 'Broadcasters (Radio/TV)', 'Builders (General Contractors/Residential)', 'Building Materials & Equipment', 'Building Trade Unions', 'Business Associations, Business Services',
            'Cable & Satellite TV Production & Distribution', 'Cattle Ranchers, Dairy, Livestock, Meat processing & products, Poultry & Eggs', 'Chemical & Related Manufacturing', 'Chiropractors', 'Clergy & Religious Organizations', 'Clothing Manufacturing', 'Colleges, Universities, Schools, Training Center', 'Communications (Electronics)', 'Computer Software', 'Construction, Construction Services, Home Builders, Residential Construction, Construction Unions', 'Crop Production & Basic Processing', 'Cruise Lines, Cruise Ships & Lines',
            'Dentists, Dental Clinic', 'Doctors & Other Health Professionals', 
            'Electric Utilities, Electronics Manufacturing & Equipment, Electronics, Power Utilities, Energy & Natural Resources', 'Entertainment Industry, Recreation, Live Entertainment', 
            'Farm Bureaus, Farming', 'Food & Beverage', 'Food Processing & Sales, Food Products Manufacturing, Food Stores', 'Forestry & Forest Products', 'Foundations, Philanthropists & Non-Profits', 'Funeral Services', 
            'Garbage Collection/Waste Management', 'Gas & Oil', 'General Contractors', 'Government Employee Unions, Government Employees', 'Health, Health Professionals, Health Services/HMOs, Health Care Services, Hospitals & Nursing Homes', 'Hotels, Motels & Tourism, Lodging (Tourism)', 'Human Rights',
            'Industrial Unions', 'Insurance Company', 'Internet Company, Internet Service Provider',
            'Labor', 'Logging, Timber & Paper Mills',
            'Manufacturing (Misc), Manufacturing & Distributing', 'Medical Supplies', 'Mining', 'Mortgage Bankers & Brokers', 'Motion Picture Production & Distribution', 'Music Production, Record Companies, Singers', 
            'Non-profits, Foundations & Philanthropists', 'Nurses', 'Nutritional & Dietary Supplements',
            'Pharmaceutical Manufacturing, Pharmacies, Health Products', 'Physicians & Other Health Professionals', 'Postal Unions', 'Printing & Publishing', 'Private Equity & Investment Firms', 'Professional Sports, Sports Arenas & Related Equipment & Services',
            'Railroads', 'Real Estate', 'Retail Sales', 
            'Securities Company', 'Special Trade Contractors', 'Steel Production', 'Stock Brokers, Investment Industry', 
            'Teachers (Education), Trainer, Instructor', 'Telecom Services & Equipment, Telephone Utilities', 'Textiles', 'Tobacco', 'Transportation Services', 'Trucking', 
            'Venture Capital'            
        ];

        foreach ($industries as $industry) {
            Industry::firstOrCreate([
                'industry_name' => $industry
            ]);
        }
    }
}

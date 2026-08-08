<?php

namespace Database\Seeders;

use App\Models\portfolio;
use App\Models\portfolioImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

/**
 * Recreates the real portfolio listings (with their original photos, prices,
 * and map coordinates) so a freshly deployed environment isn't empty. The
 * source photos ship with the repo under database/seed-assets/ (independent
 * of the storage volume) and are copied onto the public disk here.
 *
 * Safe to re-run: skips entirely if any portfolio already exists, so it
 * never duplicates or overwrites real listings added later via the admin UI.
 */
class PortfolioDemoSeeder extends Seeder
{
    public function run(): void
    {
        if (portfolio::query()->exists()) {
            return;
        }

        $items = [
            [
                'seed_dir' => 2,
                'title' => 'ბინა ~ დიდი დიღომი',
                'address' => 'დემეტრე თავდადებულის 40',
                'area' => '44,5',
                'rooms' => '2',
                'lat' => 41.796250,
                'lng' => 44.760880,
                'price' => 74000,
                'description' => 'ინტერიერის სრული რემონტი: 12 000$',
                'gallery' => [
                    'hq2Wu0SlyriiKaEHwmRJa71O8GdECf2Pco0cohEm.jpg',
                    'wlnmsR369BIY2nqNZnIXefUANvvAEkY4rPkijKAD.jpg',
                    'Jb3KsprZ7hPHRz5b5YQTHMgBfVkwKSMCEYbo2HrV.jpg',
                    'o6hDxmClrbJfvCazr9Po9HWTag7TEV6SVZU5rLhT.jpg',
                    'hnSlIXSb2uIHKRQu0Z67pqtG8KAExPwM2jIlRNJT.jpg',
                    'L6GLBa4f9TEeKoV1GKytu4j5AeNTzHrEhF5NFfJa.jpg',
                    'aA2KmkioEhBxjPadH8uvACAE5VmFhlmhtVrVCZjB.jpg',
                ],
            ],
            [
                'seed_dir' => 3,
                'title' => 'ბინა ~ დიდი დიღომი',
                'address' => 'კრისტიან სტივენის 25',
                'area' => '50',
                'rooms' => '2',
                'lat' => 41.786255,
                'lng' => 44.736847,
                'price' => 75000,
                'description' => 'ინტერიერის სრული რემონტი: 13 500$',
                'gallery' => [
                    '3VBSibWYBTfcjohYG2UHvU3SgYFbysd6X65wv6yx.jpg',
                    'OqDkL6eZ3alf8QIUFShhpZFlTDe4pYKrX3o8pSwh.jpg',
                    'Uc0UAqdmLLYh1joVtMRp2aJudZoViCCtnS8jPxJ7.jpg',
                    'NIbtUt6N0TsfBzlGz8uF4Qq8t3LujRWIcXiPUpgj.jpg',
                    'tPVl0m5vOWn8imdGIz5qD7Tj29OzPWdcXFNqJJOB.jpg',
                    '5onQVhEFku5MCyAozCkIvdNvU7sDHCnyIxbVCuab.jpg',
                    '0pads3Kv3wLBJOy0IaFDlfPIWJPh8Uq9CAGcjANe.jpg',
                    'dr1HH9PrNNJE5SN91MQsrDHr6e6Fst6C1a2WK3mj.jpg',
                    'Kmg9XXQh2biw6yVDl8ASJkHcRnFDh8JFQF6hfLMs.jpg',
                ],
            ],
            [
                'seed_dir' => 4,
                'title' => 'ბინა ~ დიდი დიღომი',
                'address' => 'დემეტრე თავდადებულის 40',
                'area' => '43.5',
                'rooms' => '2',
                'lat' => 41.796250,
                // Original data had lng 43.760880 (a typo landing far outside
                // Tbilisi) — corrected to match this address's real location.
                'lng' => 44.760880,
                'price' => 73000,
                'description' => 'ინტერიერის სრული რემონტი: 11 800$',
                'gallery' => [
                    'STkwbvsm2wK9SMqUpUByBEK1pzlvYhddcnlU8P6C.jpg',
                    'dCsGfgaLF7x8FJXceyTqcrpb10LeuE4gjOcWZTRx.jpg',
                    'C4h6we5s49sisaNMxSdrutI0GoXemexsbwfJAtXA.jpg',
                    'PBe7b2BxwID7632cAGG1RjLNGt2WMHUAF9woQMS9.jpg',
                    'ZpzEOjcKXGX761DdOJz2byvxsAHV653ZcUYyIBBA.jpg',
                    'TmW0P84SUa0TtZ18GJgnohb1WBDyIKtqr7kpnHCO.jpg',
                    'y7tcjnZKGFAvNIrNAUv7jAjpvt9jzKrBVODnpScH.jpg',
                    'U3INcpg5ylY89s99GMf8aNb7a6JHOPBlPPZtlIts.jpg',
                    'M9vUyigpAMC3iCtxlxDeYEgEYT08uU4XxB7EFjIF.jpg',
                    '1XLn3qRYDeBNvnk1LuYhe2B69MemdLy0yRhUialk.jpg',
                ],
            ],
        ];

        foreach ($items as $item) {
            $sourceDir = database_path("seed-assets/portfolio/{$item['seed_dir']}");

            $p = portfolio::create([
                'title' => $item['title'],
                'address' => $item['address'],
                'area' => $item['area'],
                'rooms' => $item['rooms'],
                'lat' => $item['lat'],
                'lng' => $item['lng'],
                'price' => $item['price'],
                'description' => $item['description'],
                'cover_image' => '',
            ]);

            $destDir = "portfolio/{$p->id}";

            $coverPath = "$destDir/cover.jpg";
            Storage::disk('public')->put($coverPath, file_get_contents("$sourceDir/cover.jpg"));
            $p->update(['cover_image' => $coverPath]);

            foreach ($item['gallery'] as $filename) {
                $imagePath = "$destDir/gallery/$filename";
                Storage::disk('public')->put($imagePath, file_get_contents("$sourceDir/gallery/$filename"));

                portfolioImage::create([
                    'portfolio_id' => $p->id,
                    'image' => $imagePath,
                ]);
            }
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Hotel;


class ImportHotels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:hotels {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import hotels from a CSV file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = $this->argument('file');

        if (!file_exists($file)) {
            $this->error('The specified file does not exist.');
            return;
        }

        $csvData = array_map(function ($row) {
            return str_getcsv($row, ';');
        }, file($file));

        $requiredColumns = ['Hotel Name', 'Image', 'City', 'Address', 'Description', 'Stars'];
        $header = array_shift($csvData);

        if (count($header) !== count($requiredColumns) || array_diff($requiredColumns, $header)) {
            $this->error('Invalid CSV file format. Please check if all required columns are present.');
            return;
        }

        $this->info('Header Row: [' . implode('; ', $header) . ' ]');

        foreach ($csvData as $index => $row) {
            if (count($row) !== count($header)) {
                $this->error("Invalid data row at index {$index}. The number of columns does not match the header.");
                return;
            }

            $validator = Validator::make(array_combine($header, $row), [
                'Hotel Name' => 'required',
                'Image' => 'required',
                'City' => 'required',
                'Address' => 'required',
                'Stars' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                dd($validator->failed());
                $this->error("Invalid data row at index {$index}. Please check the data rows.");
                return;
            }
        }

        $this->output->progressStart(count($csvData));

        foreach ($csvData as $row) {
            Hotel::create([
                'name'        => $row[0], // Hotel Name
                'image'       => $row[1], // Image
                'city'        => $row[2], // City
                'address'     => $row[3], // Address
                'description' => $row[4], // Description
                'stars'       => $row[5], // Stars 
            ]);

            $this->output->progressAdvance();
        }

        $this->output->progressFinish();

        $this->info('Hotels imported successfully!');
    }
}

<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Investment;
use App\Models\SensorData;
use App\Services\Base64Services;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CustomNotification;

class StatisticsController extends Controller
{
    public function sensorStatistics(Request $request)
    {
    
            $year = $request->input('year', now()->year);  // Ano padrão se não for passado
            $month = $request->input('month', null);        // Mês opcional
            $day = $request->input('day', null);            // Dia opcional
        
            // Inicializa consultas
            $queryTemperature = SensorData::where('type', 'temperature')->whereYear('recorded_at', $year);
            $queryPh = SensorData::where('type', 'ph')->whereYear('recorded_at', $year);
            $queryTurbidity = SensorData::where('type', 'turbidity')->whereYear('recorded_at', $year);
            $queryTemperatureWatter = SensorData::where('type', 'temperatureWater')->whereYear('recorded_at', $year);
            $queryhumidity = SensorData::where('type', 'humidity')->whereYear('recorded_at', $year);
            $queryconductivity = SensorData::where('type', 'conductivity')->whereYear('recorded_at', $year);

        
            if ($month) {
                $queryTemperature->whereMonth('recorded_at', $month);
                $queryPh->whereMonth('recorded_at', $month);
                $queryTurbidity->whereMonth('recorded_at', $month);
                $queryTemperatureWatter->whereMonth('recorded_at', $month);
                $queryhumidity->whereMonth('recorded_at', $month);
                $queryconductivity->whereMonth('recorded_at', $month);

            }
        
            if ($day) {
                $queryTemperature->whereDay('recorded_at', $day);
                $queryPh->whereDay('recorded_at', $day);
                $queryTurbidity->whereDay('recorded_at', $day);
                $queryTemperatureWatter->whereDay('recorded_at', $day);
                $queryhumidity->whereDay('recorded_at', $day);
                $queryconductivity->whereDay('recorded_at', $day);
                
                // 🔹 Se o user forneceu um DIA, agrupamos por HORA
                $temperatureByHour = $queryTemperature->selectRaw('HOUR(recorded_at) as hour, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('hour')
                    ->orderBy('hour')
                    ->pluck('avg_value', 'hour');
        
                $phByHour = $queryPh->selectRaw('HOUR(recorded_at) as hour, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('hour')
                    ->orderBy('hour')
                    ->pluck('avg_value', 'hour');
        
                $turbidityByHour = $queryTurbidity->selectRaw('HOUR(recorded_at) as hour, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('hour')
                    ->orderBy('hour')
                    ->pluck('avg_value', 'hour');

                $temperatureWaterByHour = $queryTemperatureWatter->selectRaw('HOUR(recorded_at) as hour, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('hour')
                    ->orderBy('hour')
                    ->pluck('avg_value', 'hour');

                $humidityByHour = $queryhumidity->selectRaw('HOUR(recorded_at) as hour, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('hour')
                    ->orderBy('hour')
                    ->pluck('avg_value', 'hour');

                $conductivityByHour = $queryconductivity->selectRaw('HOUR(recorded_at) as hour, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('hour')
                    ->orderBy('hour')
                    ->pluck('avg_value', 'hour');
        
                return response()->json([
                    'temperature' => $temperatureByHour,
                    'ph' => $phByHour,
                    'turbidity' => $turbidityByHour,
                    'temperatureWater'  => $temperatureWaterByHour,
                    'humidity'  => $humidityByHour,
                    'conductivity'  => $conductivityByHour,
                ]);
            } 
            
            if ($month) {
                // 🔹 Se o usuário forneceu um MÊS, agrupamos por DIA
                $temperatureByDay = $queryTemperature->selectRaw('DAY(recorded_at) as day, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('avg_value', 'day');
        
                $phByDay = $queryPh->selectRaw('DAY(recorded_at) as day, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('avg_value', 'day');
        
                $turbidityByDay = $queryTurbidity->selectRaw('DAY(recorded_at) as day, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('avg_value', 'day');

                $temperatureWaterByDay = $queryTemperatureWatter->selectRaw('DAY(recorded_at) as day, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('avg_value', 'day');

                $humidityByDay = $queryhumidity->selectRaw('DAY(recorded_at) as day, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('avg_value', 'day');

                $conductivityByDay = $queryconductivity->selectRaw('DAY(recorded_at) as day, ROUND(AVG(value), 2) as avg_value')
                    ->groupBy('day')
                    ->orderBy('day')
                    ->pluck('avg_value', 'day');
        
                return response()->json([
                    'temperature' => $temperatureByDay,
                    'ph' => $phByDay,
                    'turbidity' => $turbidityByDay,
                    'temperatureWater'  => $temperatureWaterByDay,
                    'humidity'  => $humidityByDay,
                    'conductivity'  => $conductivityByDay,
                ]);
            } 
            
            // 🔹 Se apenas o ANO foi passado, agrupamos por MÊS
            $temperatureByMonth = $queryTemperature->selectRaw('MONTH(recorded_at) as month, ROUND(AVG(value), 2) as avg_value')
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('avg_value', 'month');
        
            $phByMonth = $queryPh->selectRaw('MONTH(recorded_at) as month, ROUND(AVG(value), 2) as avg_value')
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('avg_value', 'month');
        
            $turbidityByMonth = $queryTurbidity->selectRaw('MONTH(recorded_at) as month, ROUND(AVG(value), 2) as avg_value')
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('avg_value', 'month');

            $temperatureWaterByMonth = $queryTemperatureWatter->selectRaw('MONTH(recorded_at) as month, ROUND(AVG(value), 2) as avg_value')
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('avg_value', 'month');

            $humidityByMonth = $queryhumidity->selectRaw('MONTH(recorded_at) as month, ROUND(AVG(value), 2) as avg_value')
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('avg_value', 'month');

            $conductivityByMonth = $queryconductivity->selectRaw('MONTH(recorded_at) as month, ROUND(AVG(value), 2) as avg_value')
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('avg_value', 'month');
        
            return response()->json([
                'temperature' => $temperatureByMonth,
                'ph' => $phByMonth,
                'turbidity' => $turbidityByMonth,
                'temperatureWater'  => $temperatureWaterByMonth,
                'humidity'  => $humidityByMonth,
                'conductivity'  => $conductivityByMonth,
            ]);
        }

        public function store(Request $request)
        {
            // Validação dos dados recebidos
            $validatedData = $request->validate([
                'type' => 'required|string',
                'value' => 'required|numeric',
            ]);
    
            // Criar e salvar os dados do sensor no banco de dados
            $sensorData = SensorData::create([
                'type' => $validatedData['type'],
                'value' => $validatedData['value'],
            ]);
    
            return response()->json([
                'message' => 'Dados do sensor salvos com sucesso!',
                'data' => $sensorData
            ], 201); // 201 Created
        }
}
 
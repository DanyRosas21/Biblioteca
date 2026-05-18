<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\User;
use App\Models\Libro;
use Illuminate\Support\Facades\DB;

class PrestamosController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::paginate(5);
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $usuarios = User::paginate(5);
        $libros = Libro::paginate(5);
        return view('prestamos.create', compact('usuarios', 'libros'));
    }

    public function buscarUsuarios(Request $request)
    {
        $q = $request->get('q');
        $usuarios = User::where('id', 'LIKE', "%{$q}%")
                        ->orWhere('name', 'LIKE', "%{$q}%")
                        ->orWhere('email', 'LIKE', "%{$q}%")
                        ->take(10)
                        ->get();
        return response()->json($usuarios);
    }

    public function buscarLibros(Request $request)
    {
        $q = $request->get('q');
        $libros = Libro::where('estatus', 0)
                    ->where(function ($query) use ($q) {
                        $query->where('id', 'LIKE', "%{$q}%")
                            ->orWhere('nombre', 'LIKE', "%{$q}%")
                            ->orWhere('autor', 'LIKE', "%{$q}%");
                    })
                    ->take(10)
                    ->get();
        return response()->json($libros);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
            'fecha_entrega' => 'required|date',
            'estado' => 'required|in:activo,devuelto,vencido',
        ]);

        DB::beginTransaction();

        try {
            $prestamo = new Prestamo();
            $prestamo->usuario_id = $request->input('usuario_id');
            $prestamo->libro_id = $request->input('libro_id');
            $prestamo->fecha_entrega = $request->input('fecha_entrega');
            $prestamo->estado = $request->input('estado');
            $prestamo->save();

            if ($request->estado == 'activo') {
                $libro = Libro::find($request->input('libro_id'));
                $libro->estatus = 1;
                $libro->save();
            }

            DB::commit();

            return redirect()->route('prestamos.index')->with('success', 'Préstamo creado exitosamente');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function entregar($id)
    {

        \DB::beginTransaction();
        try {
            $prestamo = Prestamo::findOrFail($id);
            $prestamo->estado = 'entregado';
            $prestamo->fecha_entrega = now();
            $prestamo->save();

            $libro = Libro::find($prestamo->libro_id);
            $libro->estatus = 0;
            $libro->save();

        \DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('prestamos.index')->with('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('prestamos.index')->with('success', 'Libro entregado exitosamente');
    }
}

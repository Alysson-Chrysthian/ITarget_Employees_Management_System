<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatorio de funcionarios</title>

    <style>
        h1 {
            text-align: center;
        }

        .date {
            position: fixed;
            top: 0px;
            right: 0px;
        }
        
        table {
            border-collapse: collapse;
        }

        td, th {
            padding: 8px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Relatorio dos funcionarios</h1>
    
    <p class="date">{{ date('d/m/Y H:i:s') }}</p>

    <p><strong>Gerado por:</strong> {{ auth('admin')->user()->name }}</p>

    <div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Matricula</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->cpf }}</td>
                            <td>{{ $employee->registration }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</body>
</html>
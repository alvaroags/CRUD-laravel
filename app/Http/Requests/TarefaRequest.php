<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tarefa' => 'required|max:191',
            'descricao' => 'required',
            'status' => 'required|in:Pendente,Em andamento,Concluída',
            'prioridade' => 'required|in:Baixa,Média,Alta', ];
    }

    public function messages(): array
    {
        return [
            'tarefa.required' => 'O campo tarefa é obrigatório',
            'tarefa.max' => 'O campo tarefa deve ter no máximo 191 caracteres',
            'descricao.required' => 'O campo descrição é obrigatório',
            'status.required' => 'O campo status é obrigatório',
            'status.in' => 'O campo status deve ser Pendente, Em andamento ou Concluída',
            'prioridade.required' => 'O campo prioridade é obrigatório',
            'prioridade.in' => 'O campo prioridade deve ser Baixa, Média ou Alta',
        ];
    }
}

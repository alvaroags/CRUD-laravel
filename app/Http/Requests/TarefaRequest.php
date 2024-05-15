<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer esta solicitação.
     */
    public function authorize(): bool
    {
        return true;  // Permite que a solicitação seja autorizada
    }

    /**
     * Obtém as regras de validação que se aplicam à solicitação.
     */
    public function rules(): array
    {
        return [
            'tarefa' => 'required|max:191',  // Campo 'tarefa' é obrigatório e tem no máximo 191 caracteres
            'descricao' => 'required',  // Campo 'descricao' é obrigatório
            'status' => 'required|in:Pendente,Em andamento,Concluída',  // Campo 'status' é obrigatório e deve ser um dos valores especificados
            'prioridade' => 'required|in:Baixa,Média,Alta',  // Campo 'prioridade' é obrigatório e deve ser um dos valores especificados
        ];
    }

    /**
     * Obtém as mensagens de validação personalizadas para os erros.
     */
    public function messages(): array
    {
        return [
            'tarefa.required' => 'O campo tarefa é obrigatório',  // Mensagem de erro para campo 'tarefa' obrigatório
            'tarefa.max' => 'O campo tarefa deve ter no máximo 191 caracteres',  // Mensagem de erro para campo 'tarefa' com limite de caracteres
            'descricao.required' => 'O campo descrição é obrigatório',  // Mensagem de erro para campo 'descricao' obrigatório
            'status.required' => 'O campo status é obrigatório',  // Mensagem de erro para campo 'status' obrigatório
            'status.in' => 'O campo status deve ser Pendente, Em andamento ou Concluída',  // Mensagem de erro para valores inválidos no campo 'status'
            'prioridade.required' => 'O campo prioridade é obrigatório',  // Mensagem de erro para campo 'prioridade' obrigatório
            'prioridade.in' => 'O campo prioridade deve ser Baixa, Média ou Alta',  // Mensagem de erro para valores inválidos no campo 'prioridade'
        ];
    }
}

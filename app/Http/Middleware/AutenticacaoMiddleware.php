<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {

        echo $metodo_autenticacao. ' - '. $perfil. '<br>'; 
        //verifica se o usario possui acesso a rota
        if($metodo_autenticacao == 'padrao'){
            echo 'Verificar o usuario e senha do Banco de Dados'. '<br>';
        }
        if($metodo_autenticacao == 'ldap'){
            echo 'Verificar o usuario e senha no AD'. '<br>';
        }

        if($perfil == 'visitante'){
            echo 'Exibir recursos limitados <br>';
        }
        else{
            echo 'Carregar perfil do banco de dados';
        }

        if(false){
            return $next($request);
        } else{
            return Response('Acesso negado! Rota exige autenticação');
        }
        // return $next($request);
    }
}

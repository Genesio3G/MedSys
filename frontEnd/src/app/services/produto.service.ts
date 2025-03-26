import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError, switchMap } from 'rxjs/operators';
import { Produto } from '../models/produto.model';

@Injectable({
  providedIn: 'root'
})
export class ProdutoService {
  private apiUrl = '/api/produto';
  private csrfToken: string | null = null; // Armazena o token CSRF

  constructor(private http: HttpClient) {
    // Obtém o token CSRF ao inicializar o serviço
    this.getCsrfToken().subscribe(
      (response: any) => {
        this.csrfToken = response.csrf_token; // Armazena o token CSRF
        console.log('CSRF Token:', this.csrfToken); // Mostra o token CSRF no console
      },
      (error) => {
        console.error('Erro ao obter o token CSRF:', error);
      }
    );
  }

  // Método para obter o token CSRF
  getCsrfToken(): Observable<any> {
    return this.http.get('/api/csrf-token', { withCredentials: true });
  }

  // Adicionar Produto
  adicionarProduto(formData: FormData): Observable<any> {
    const headers = new HttpHeaders({
      'X-CSRF-TOKEN': this.csrfToken || '' // Envia o token CSRF no cabeçalho
    });
  
    return this.http.post(this.apiUrl, formData, { headers, withCredentials: true }).pipe(
      catchError((error) => {
        if (error.status === 419) {
          // Se o token CSRF estiver expirado, obtém um novo token e reenvia a requisição
          return this.getCsrfToken().pipe(
            switchMap((response: any) => {
              this.csrfToken = response.csrf_token; // Atualiza o token CSRF
              const newHeaders = new HttpHeaders({
                'X-CSRF-TOKEN': this.csrfToken || ''
              });
              // Reenvia a requisição com o token atualizado
              return this.http.post(this.apiUrl, formData, { headers: newHeaders, withCredentials: true });
            })
          );
        } else {
          // Lança outros erros normalmente
          return throwError(error);
        }
      })
    );
  }
  
  atualizarProduto(nrRegisto: string, formData: FormData): Observable<any> {
    const url = `${this.apiUrl}/${nrRegisto}`;
    const headers = new HttpHeaders({
      'X-CSRF-TOKEN': this.csrfToken || '' // Envia o token CSRF no cabeçalho
    });
  
    return this.http.put(url, formData, { headers, withCredentials: true }).pipe(
      catchError(this.handleError)
    );
  }
  
  

  // Obter Produtos
  obterProdutos(): Observable<Produto[]> {
    return this.http.get<Produto[]>(this.apiUrl).pipe(catchError(this.handleError));
  }


  

  // Deletar Produto
  deletarProduto(nrRegisto: string): Observable<void> {
    const url = `${this.apiUrl}/${nrRegisto}`;
    const headers = new HttpHeaders({
      'X-CSRF-TOKEN': this.csrfToken || '' // Envia o token CSRF no cabeçalho
    });

    return this.http.delete<void>(url, { headers, withCredentials: true }).pipe(
      catchError(this.handleError)
    );
  }

  // Tratamento de Erros
  private handleError(error: HttpErrorResponse): Observable<never> {
    let errorMessage = 'Erro desconhecido.';
    if (error.error instanceof ErrorEvent) {
      errorMessage = `Erro do lado do cliente: ${error.error.message}`;
    } else {
      errorMessage = `Erro do servidor: Código ${error.status}, Mensagem: ${error.message}`;
    }
    console.error(errorMessage);
    return throwError(() => new Error(errorMessage));
  }
}

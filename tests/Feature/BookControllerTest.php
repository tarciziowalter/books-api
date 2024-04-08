<?php

use App\Models\Book;
use App\Models\User;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    public function test_authenticated_user_can_create_book()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);
        
        // Chama o endpoint para criar um novo livro, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->postJson('/api/books', [
                            'title' => 'Novo Livro',
                            'description' => 'Descrição do novo livro',
                            'author_id' => 1,
                         ]);
                         
        // Verifica se o Livro foi criado com sucesso
        $response->assertStatus(201);
    }

    public function test_authenticated_user_can_view_book_details()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);
        
        // Cria um livro de teste
        $book = Book::factory()->create();
        
        // Chama o endpoint para visualizar os detalhes do livro criado, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->getJson('/api/books/' . $book->id);

        // Verifica se a resposta foi bem-sucedida e se contém os detalhes do livro
        $response->assertStatus(200)
                 ->assertJson($book->toArray());
    }

    public function test_authenticated_user_can_view_all_books()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);

        // Cria alguns livros de teste
        $books = Book::factory()->count(3)->create();
        
        // Chama o endpoint para visualizar todos livros, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->getJson('/api/books');
        
        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_update_book()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);

        // Cria um livro de teste
        $book = Book::factory()->create();

        // Dados para atualização do livro
        $data = [
            'title' => 'Livro atualizado',
            'description' => 'Descrição atualizada',
            'author_id' => 1
        ];

        // Chama o endpoint para atualizar o livro, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->putJson('/api/books/' . $book->id, $data);

        // Verifica se o livro foi atualizado corretamente no banco de dados
        $this->assertDatabaseHas('books', $data);

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(200)
                 ->assertJson($data); // Verifica se os dados retornados correspondem aos dados atualizados
    }

    public function test_authenticated_user_can_delete_book()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);

        // Cria um livro de teste
        $book = Book::factory()->create();

        // Chama o endpoint para excluir o livro, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->deleteJson('/api/books/' . $book->id);

        // Verifica se o livro foi excluído corretamente do banco de dados
        $this->assertDatabaseMissing('books', ['id' => $book->id]);

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(204); // 204 - No Content
    }
}
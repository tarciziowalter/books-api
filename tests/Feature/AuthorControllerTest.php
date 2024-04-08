<?php

use App\Models\Author;
use App\Models\User;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    public function test_authenticated_user_can_create_author()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);
        
        // Chama o endpoint para criar um novo autor, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->postJson('/api/authors', [
                            'name' => 'Fulano da Silva',
                            'email' => 'fulano@ciclano.com'
                         ]);
                         
        // Verifica se o autor foi criado com sucesso
        $response->assertStatus(201);
    }

    public function test_authenticated_user_can_view_author_details()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);
        
        // Cria um autor de teste
        $author = Author::factory()->create();
        
        // Chama o endpoint para visualizar os detalhes do autor criado, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->getJson('/api/authors/' . $author->id);

        // Verifica se a resposta foi bem-sucedida e se contém os detalhes do autor
        $response->assertStatus(200)
                 ->assertJson($author->toArray());
    }

    public function test_authenticated_user_can_view_all_authors()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);

        // Cria alguns autores de teste
        $authors = Author::factory()->count(3)->create();
        
        // Chama o endpoint para visualizar todos autores, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->getJson('/api/authors');
        
        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_update_author()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);

        // Cria um autor de teste
        $author = author::factory()->create();

        // Dados para atualização do autor
        $data = [
            'name' => 'Fulano da Silva',
            'email' => 'ciclano@fulano.com'
        ];

        // Chama o endpoint para atualizar o autor, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->putJson('/api/authors/' . $author->id, $data);

        // Verifica se o autor foi atualizado corretamente no banco de dados
        $this->assertDatabaseHas('authors', $data);

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(200)
                 ->assertJson($data); // Verifica se os dados retornados correspondem aos dados atualizados
    }

    public function test_authenticated_user_can_delete_author()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário gerando um token JWT
        $token = auth()->login($user);

        // Cria um autor de teste
        $author = Author::factory()->create();

        // Chama o endpoint para excluir o autor, incluindo o token JWT no cabeçalho de autorização
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->deleteJson('/api/authors/' . $author->id);

        // Verifica se o autor foi excluído corretamente do banco de dados
        $this->assertDatabaseMissing('authors', ['id' => $author->id]);

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(204); // 204 - No Content
    }
}
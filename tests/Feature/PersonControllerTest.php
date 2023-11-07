<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Person;


class PersonControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index method.
     */
    public function testIndexMethod()
    {
        $response = $this->get(route('persons.index'));
        $response->assertStatus(200);
    }

    /**
     * Test create method.
     */
    public function testCreateMethod()
    {
        $response = $this->get(route('persons.create'));
        $response->assertStatus(200)
            ->assertViewIs('persons.create');
    }

    /**
     * Test store method.
     */
    public function testStoreMethod()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ];

        $response = $this->post(route('persons.store'), $data);

        $response->assertRedirect(route('persons.index'));

        $this->assertDatabaseHas('persons', $data);
    }

    /**
     * Test edit method.
     */
    public function testEditMethod()
    {
        // Create a sample person record in the database
        $person = Person::factory()->create();

        // Send a GET request to the edit route with the person's ID
        $response = $this->get(route('persons.edit', $person));

        $response->assertStatus(200)
            ->assertViewIs('persons.edit')
            ->assertViewHas('contact', $person);
    }

    /**
     * Test update method.
     */
    public function testUpdateMethod()
    {
        // Create a sample person record in the database
        $person = Person::factory()->create();

        // Data to update the person's information
        $updatedData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ];

        // Send a PUT request to the update route with the updated data
        $response = $this->put(route('persons.update', $person), $updatedData);

        $response->assertRedirect(route('persons.index'));

        // Check if the person's data in the database has been updated
        $this->assertDatabaseHas('persons', $updatedData);
    }

    /**
     * Test delete method.
     */

    public function testDestroyMethod()
    {
        // Create a sample person record in the database
        $person = Person::factory()->create();

        // Send a DELETE request to the destroy route with the person's ID
        $response = $this->delete(route('persons.destroy', $person));

        $response->assertRedirect(route('persons.index'));

        // Check if the person's data has been deleted from the database
        $this->assertDatabaseMissing('persons', ['id' => $person->id]);
    }
}

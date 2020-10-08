<?php


namespace App\Repository;


use App\Domain\Model\User;
use App\Domain\Model\Users;
use Elasticsearch\Client;

class UserRepository implements \App\Domain\Repository\UserRepository
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function Find(string $matchText): Users
    {
        $params = [
            'index'   => 'users',
            '_source' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ],
            'body'    => [
                'query' => [
                    'multi_match' => [
                        'fields'   => ['name', 'email'],
                        'query'    => $matchText,
                        'operator' => 'or',
                    ],
                ],
            ],
        ];

        $res = $this->client->search($params);

        $users = Users::create();
        if (empty($res['hits']['hits'])) {
            return $users;
        }

        foreach ($res['hits']['hits'] as $item) {
            $user = User::reconstructFromRepository(
                $item['_source']['id'],
                $item['_source']['name'],
                $item['_source']['email'],
                $item['_source']['created_at'],
                $item['_source']['updated_at'],
            );
            $users->addUser($user);
        }

        return $users;
    }
}

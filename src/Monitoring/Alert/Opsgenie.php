<?php

namespace Monitoring\Alert;

use JTL\OpsGenie\Client\Alert\Alert;
use JTL\OpsGenie\Client\Alert\CreateAlertRequest;
use JTL\OpsGenie\Client\Alert\CreateAlertResponse;
use JTL\OpsGenie\Client\AlertApiClient;
use JTL\OpsGenie\Client\HttpClient;

class Opsgenie
{
    public function raise($title, $description, array $tags = [], $entity = null, $alias = null, $source = null)
    {
        $client = new AlertApiClient(HttpClient::createForEUApi(getenv('OPSGENIE_API_KEY')));
        $alert = new Alert(
            $entity ?? '',
            $alias ?? '',
            $title,
            $source ?? ''
        );
        $alert->setDescription($description);
        foreach ($tags as $tag) {
            $alert->appendTag($tag);
        }
        $request = new CreateAlertRequest($alert);
        return $client->createAlert($request);
    }
}
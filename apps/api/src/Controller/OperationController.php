<?php

namespace App\Controller;


use App\Entity\Operation;
use App\Form\OperationForm;
use App\Service\OperationService;
use FOS\RestBundle\Controller\Annotations as Rest;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation as Nelmio;
use App\Exception\InvalidFormException;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Connection;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * Class OperationController
 * @package App\Controller
 */
class OperationController extends FOSRestController
{
    /**
     * Add new operation
     *
     * Calculates operation and then stores it in database; Require parameters: arguments, type
     * payload example: { "aguments": [2,4], "type": "add"}
     * possible types: "add","subtract","multiply","divide","power","root","factorial",'percent";
     *
     * @Rest\Post("/api/v1/operation")
     *
     * @Rest\View(
     *     serializerGroups={"default"},
     *     serializerEnableMaxDepthChecks=true
     * )
     *
     * @SWG\Parameter(
     *     name="operation",
     *     in="body",
     *     @Nelmio\Model(type="App\Form\OperationForm")
     * )
     *
     * @SWG\Tag(name="Operation")
     * @SWG\Response(
     *     response=200,
     *     description="Returned when successful",
     *     @Nelmio\Model(type=App\Entity\Operation::class, groups={"default"})
     * )
     * @SWG\Response(
     *     response=400,
     *     description="Returned when the form has errors"
     * )
     *
     * @param Request $request
     * @param Connection $connection
     * @param OperationService $service
     * @return array|null
     * @throws \Exception|InvalidFormException
     */
    public function operationPost(Request $request, Connection $connection, OperationService $service)
    {
        $connection->beginTransaction();

        try {
            $data = json_decode($request->getContent(), true);

            $response = $service->addItem($data, OperationForm::class, Operation::class);
            $connection->commit();

            return $response->getItem();
        } catch (InvalidFormException $exception) {
            $connection->rollback();
            return $exception->getForm();
        } catch (\Exception $exception) {
            $connection->rollback();
            throw $exception;
        }
    }


    /**
     * Get operation history
     *
     * Return list of operations, require date from (YYYY-MM-DD) and date to (YYYY-MM-DD)
     * query parameters example: payload example: ?from=2018-12-12
     *
     * @Rest\Get("/api/v1/operation")
     *
     * @Rest\View(
     *     serializerGroups={"default"},
     *     serializerEnableMaxDepthChecks=true
     * )
     *
     * @Rest\QueryParam(
     *     name="from",
     *     requirements="(\d{4})-(\d{2})-(\d{2})",
     *     nullable=false,
     *     description="date from (YYYY-MM-DD)"
     *     )
     * @Rest\QueryParam(
     *     name="to",
     *     requirements="(\d{4})-(\d{2})-(\d{2})",
     *     nullable=false,
     *     description="date to (YYYY-MM-DD)"
     *     )
     *
     * @SWG\Tag(name="Operation")
     * @SWG\Response(
     *     response=200,
     *     description="Returned when successful",
     * )
     *
     * @param Request $request
     * @param OperationService $service
     * @return array
     */
    public function operationGet(Request $request, OperationService $service)
    {
        return $service->getReport($request->query->all());
    }
}

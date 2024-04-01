<?php
namespace Src\UI\API\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\Application\Service\CreateInvoiceService;
use Src\Application\Service\GetInvoiceByIdService;
use Src\Domain\Repository\InvoiceRepositoryInterface;
use Src\Domain\Value\Budget\BudgetId;

class InvoiceController extends Controller
{
    /** @var CreateInvoiceService */
    private CreateInvoiceService $createInvoiceService;

    /** @var GetInvoiceByIdService */
    private GetInvoiceByIdService $getInvoiceByIdService;

    /**
     * Create a new AuthController instance.
     *
     * @param InvoiceRepositoryInterface $invoiceRepository
     */
    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->createInvoiceService = new CreateInvoiceService($invoiceRepository);
        $this->getInvoiceByIdService = new GetInvoiceByIdService($invoiceRepository);
    }

    public function invoice(Request $request): JsonResponse
    {
        return response()->json(
            $this->createInvoiceService->execute($request->budgetLines),
            Response::HTTP_CREATED
        );
    }

    public function invoices(int $id): JsonResponse
    {
        return response()->json(
            $this->getInvoiceByIdService->execute(new BudgetId($id)),
            Response::HTTP_OK
        );
    }
}

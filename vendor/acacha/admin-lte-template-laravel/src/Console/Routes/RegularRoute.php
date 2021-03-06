<?php

namespace Acacha\AdminLTETemplateLaravel\Console\Routes;

use Acacha\AdminLTETemplateLaravel\Compiler\StubFileCompiler;
use Acacha\AdminLTETemplateLaravel\Filesystem\Filesystem;

/**
 * Class RegularRoute.
 *
 * @package Acacha\AdminLTETemplateLaravel\Console
 */
class RegularRoute extends Route
{

    /**
     * RegularRoute constructor.
     *
     * @param StubFileCompiler $compiler
     * @param Filesystem $filesystem
     */
    public function __construct(StubFileCompiler $compiler, Filesystem $filesystem)
    {
        parent::__construct($compiler, $filesystem);
    }

    /**
     * Get path to stub.
     *
     * @return string
     */
    protected function getStubPath()
    {
        return __DIR__ . '/../stubs/route.stub';
    }

    /**
     * @return array
     */
    protected function obtainReplacements()
    {
        return [
            'ROUTE_LINK' => $this->getReplacements()[0],
            'ROUTE_VIEW' => $this->getReplacements()[1],
            'ROUTE_METHOD' => $this->getReplacements()[2],
        ];
    }
}

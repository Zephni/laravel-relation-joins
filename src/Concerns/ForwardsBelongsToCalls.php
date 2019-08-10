<?php

namespace Reedware\LaravelRelationJoins\Concerns;

use Reedware\LaravelRelationJoins\BelongsTo;

trait ForwardsBelongsToCalls
{
    use ForwardsParentCalls;
    use JoinsBelongsToRelations;

    /**
     * Creates a new instance of this class using a parent instance.
     *
     * @param  mixed  $parent
     * @return static
     */
    public static function newFromParent($parent)
    {
        return static::noConstraints(function() use ($parent) {
            return new BelongsTo(
                $parent->getQuery(),
                $parent->getChild(),
                $parent->getForeignKeyName(),
                $parent->getOwnerKeyName(),
                $parent->getRelationName()
            );
        });
    }
}
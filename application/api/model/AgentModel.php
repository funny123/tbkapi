<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/4/3
 * Time: 11:28
 */

namespace app\api\model;


use think\Db;
use think\Model;

class AgentModel extends Model
{
    //获取代理树
    public function getTree($id,$field)
    {
        //查询所有成员
        $members = Db::name('member')->field('id,parent_id,'.$field)->select();
        //查询代理树
        $tree = $this->treeInfo($members,$id);
        return $tree;
    }

    public function treeInfo($members,$id)
    {
        $tree = [];

        foreach ($members as $member)
        {
            if ($id == $member['parent_id'])
            {

                $member['children'] = $this->treeInfo($members,$member['id']);
                $member['name'] = '账号：'.$member['id'].'余额：'.$member['money'];
                $tree[] = $member;
            }
        }
        return $tree;
    }


    //获取每级的币值总额
    public function getCoinTotal($id)
    {
        $members = Db::name('member')->field('id,parent_id,money')->select();
        $res = $this->treeCoin($members,$id);
        return $res;
    }

    public function treeCoin($members,$id,$level=0)
    {
        $tree;
        $money = 0;
        foreach ($members as $member)
        {
            if ($member['parent_id'] == $id)
            {
                $money +=$member['money'];
                $tree [] = $this->treeCoin($members,$member['id'],$level+1);
            }
        }
        $tree['level'] = $level;
        $tree['money'] = $money;
        return $tree;
    }
}
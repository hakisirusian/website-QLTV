<?php
namespace app\Repositories;
class ReturnRepository extends BaseRepository{
 private string $select="SELECT rt.*,br.borrow_date,br.due_date,br.item_type,br.item_id,m.full_name member_name,CASE br.item_type WHEN 'book' THEN b.title WHEN 'newspaper' THEN n.name WHEN 'magazine' THEN g.name END item_title FROM book_returns rt JOIN borrows br ON br.id=rt.borrow_id JOIN members m ON m.id=br.member_id LEFT JOIN books b ON br.item_type='book' AND b.id=br.item_id LEFT JOIN newspapers n ON br.item_type='newspaper' AND n.id=br.item_id LEFT JOIN magazines g ON br.item_type='magazine' AND g.id=br.item_id";
 public function all(string $date=''):array{ $where='';$params=[]; if($date){$where=' WHERE rt.return_date=?';$params=[$date];} return $this->fetchAll($this->select.$where." ORDER BY rt.id DESC",$params); }
 public function find(int $id):?array{ return $this->fetch($this->select." WHERE rt.id=?",[$id]); }
 public function create(array $d):int{ $this->execute("INSERT INTO book_returns(borrow_id,return_date,fine_amount,note,created_by) VALUES(?,?,?,?,?)",[$d['borrow_id'],$d['return_date'],$d['fine_amount'],$d['note']??null,$d['created_by']??null]); return $this->lastInsertId(); }
 public function existsForBorrow(int $borrowId):bool{ return (int)$this->fetch("SELECT COUNT(*) c FROM book_returns WHERE borrow_id=?",[$borrowId])['c']>0; }
 public function delete(int $id):bool{ return $this->execute("DELETE FROM book_returns WHERE id=?",[$id]); }
}

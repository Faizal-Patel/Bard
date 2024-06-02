<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShakespeareWorksTableSeeder extends Seeder
{
    public function run()
    {

        // clear existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('shakespeare_works')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('shakespeare_works')->insert([
            ['work_id' => '12night', 'work_title' => 'Twelfth Night', 'work_long_title' => 'Twelfth Night, Or What You Will', 'work_year' => 1599, 'work_genre' => 'Comedy'],
            ['work_id' => 'allswell', 'work_title' => "All's Well That Ends Well", 'work_long_title' => "All's Well That Ends Well", 'work_year' => 1602, 'work_genre' => 'Comedy'],
            ['work_id' => 'antonycleo', 'work_title' => 'Antony and Cleopatra', 'work_long_title' => 'Antony and Cleopatra', 'work_year' => 1606, 'work_genre' => 'Tragedy'],
            ['work_id' => 'asyoulikeit', 'work_title' => 'As You Like It', 'work_long_title' => 'As You Like It', 'work_year' => 1599, 'work_genre' => 'Comedy'],
            ['work_id' => 'comedyerrors', 'work_title' => 'Comedy of Errors', 'work_long_title' => 'The Comedy of Errors', 'work_year' => 1589, 'work_genre' => 'Comedy'],
            ['work_id' => 'coriolanus', 'work_title' => 'Coriolanus', 'work_long_title' => 'Coriolanus', 'work_year' => 1607, 'work_genre' => 'Tragedy'],
            ['work_id' => 'cymbeline', 'work_title' => 'Cymbeline', 'work_long_title' => 'Cymbeline, King of Britain', 'work_year' => 1609, 'work_genre' => 'History'],
            ['work_id' => 'hamlet', 'work_title' => 'Hamlet', 'work_long_title' => 'The Tragedy of Hamlet, Prince of Denmark', 'work_year' => 1600, 'work_genre' => 'Tragedy'],
            ['work_id' => 'henry4p1', 'work_title' => 'Henry IV, Part I', 'work_long_title' => 'History of Henry IV, Part I', 'work_year' => 1597, 'work_genre' => 'History'],
            ['work_id' => 'henry4p2', 'work_title' => 'Henry IV, Part II', 'work_long_title' => 'History of Henry IV, Part II', 'work_year' => 1597, 'work_genre' => 'History'],
            ['work_id' => 'henry5', 'work_title' => 'Henry V', 'work_long_title' => 'History of Henry V', 'work_year' => 1598, 'work_genre' => 'History'],
            ['work_id' => 'henry6p1', 'work_title' => 'Henry VI, Part I', 'work_long_title' => 'History of Henry VI, Part I', 'work_year' => 1591, 'work_genre' => 'History'],
            ['work_id' => 'henry6p2', 'work_title' => 'Henry VI, Part II', 'work_long_title' => 'History of Henry VI, Part II', 'work_year' => 1590, 'work_genre' => 'History'],
            ['work_id' => 'henry6p3', 'work_title' => 'Henry VI, Part III', 'work_long_title' => 'History of Henry VI, Part III', 'work_year' => 1590, 'work_genre' => 'History'],
            ['work_id' => 'henry8', 'work_title' => 'Henry VIII', 'work_long_title' => 'History of Henry VIII', 'work_year' => 1612, 'work_genre' => 'History'],
            ['work_id' => 'juliuscaesar', 'work_title' => 'Julius Caesar', 'work_long_title' => 'The Tragedy of Julius Caesar', 'work_year' => 1599, 'work_genre' => 'Tragedy'],
            ['work_id' => 'kingjohn', 'work_title' => 'King John', 'work_long_title' => 'History of King John', 'work_year' => 1596, 'work_genre' => 'History'],
            ['work_id' => 'kinglear', 'work_title' => 'King Lear', 'work_long_title' => 'The Tragedy of King Lear', 'work_year' => 1605, 'work_genre' => 'Tragedy'],
            ['work_id' => 'loverscomplaint', 'work_title' => "Lover's Complaint", 'work_long_title' => "A Lover's Complaint", 'work_year' => 1609, 'work_genre' => 'Poem'],
            ['work_id' => 'loveslabours', 'work_title' => "Love's Labour's Lost", 'work_long_title' => "Love's Labour's Lost", 'work_year' => 1594, 'work_genre' => 'Comedy'],
            ['work_id' => 'macbeth', 'work_title' => 'Macbeth', 'work_long_title' => 'The Tragedy of Macbeth', 'work_year' => 1605, 'work_genre' => 'Tragedy'],
            ['work_id' => 'measure', 'work_title' => 'Measure for Measure', 'work_long_title' => 'Measure for Measure', 'work_year' => 1604, 'work_genre' => 'Comedy'],
            ['work_id' => 'merchantvenice', 'work_title' => 'Merchant of Venice', 'work_long_title' => 'The Merchant of Venice', 'work_year' => 1596, 'work_genre' => 'Comedy'],
            ['work_id' => 'merrywives', 'work_title' => 'Merry Wives of Windsor', 'work_long_title' => 'The Merry Wives of Windsor', 'work_year' => 1600, 'work_genre' => 'Comedy'],
            ['work_id' => 'midsummer', 'work_title' => "Midsummer Night's Dream", 'work_long_title' => "A Midsummer Night's Dream", 'work_year' => 1595, 'work_genre' => 'Comedy'],
            ['work_id' => 'muchado', 'work_title' => 'Much Ado about Nothing', 'work_long_title' => 'Much Ado about Nothing', 'work_year' => 1598, 'work_genre' => 'Comedy'],
            ['work_id' => 'othello', 'work_title' => 'Othello', 'work_long_title' => 'The Tragedy of Othello, Moor of Venice', 'work_year' => 1604, 'work_genre' => 'Tragedy'],
            ['work_id' => 'passionatepilgrim', 'work_title' => 'Passionate Pilgrim', 'work_long_title' => 'The Passionate Pilgrim', 'work_year' => 1598, 'work_genre' => 'Poem'],
            ['work_id' => 'pericles', 'work_title' => 'Pericles', 'work_long_title' => 'Pericles, Prince of Tyre', 'work_year' => 1608, 'work_genre' => 'History'],
            ['work_id' => 'phoenixturtle', 'work_title' => 'Phoenix and the Turtle', 'work_long_title' => 'The Phoenix and the Turtle', 'work_year' => 1601, 'work_genre' => 'Poem'],
            ['work_id' => 'rapelucrece', 'work_title' => 'Rape of Lucrece', 'work_long_title' => 'The Rape of Lucrece', 'work_year' => 1594, 'work_genre' => 'Poem'],
            ['work_id' => 'richard2', 'work_title' => 'Richard II', 'work_long_title' => 'History of Richard II', 'work_year' => 1595, 'work_genre' => 'History'],
            ['work_id' => 'richard3', 'work_title' => 'Richard III', 'work_long_title' => 'History of Richard III', 'work_year' => 1592, 'work_genre' => 'History'],
            ['work_id' => 'romeojuliet', 'work_title' => 'Romeo and Juliet', 'work_long_title' => 'The Tragedy of Romeo and Juliet', 'work_year' => 1594, 'work_genre' => 'Tragedy'],
            ['work_id' => 'sonnets', 'work_title' => 'Sonnets', 'work_long_title' => 'Sonnets', 'work_year' => 1609, 'work_genre' => 'Sonnet'],
            ['work_id' => 'tamingshrew', 'work_title' => 'Taming of the Shrew', 'work_long_title' => 'The Taming of the Shrew', 'work_year' => 1593, 'work_genre' => 'Comedy'],
            ['work_id' => 'tempest', 'work_title' => 'Tempest', 'work_long_title' => 'The Tempest', 'work_year' => 1611, 'work_genre' => 'Comedy'],
            ['work_id' => 'timonathens', 'work_title' => 'Timon of Athens', 'work_long_title' => 'The Tragedy of Timon of Athens', 'work_year' => 1607, 'work_genre' => 'Tragedy'],
            ['work_id' => 'titus', 'work_title' => 'Titus Andronicus', 'work_long_title' => 'Titus Andronicus', 'work_year' => 1593, 'work_genre' => 'Tragedy'],
            ['work_id' => 'troilus', 'work_title' => 'Troilus and Cressida', 'work_long_title' => 'Troilus and Cressida', 'work_year' => 1601, 'work_genre' => 'Tragedy'],
            ['work_id' => 'twogents', 'work_title' => 'Two Gentlemen of Verona', 'work_long_title' => 'Two Gentlemen of Verona', 'work_year' => 1594, 'work_genre' => 'Comedy'],
            ['work_id' => 'venusadonis', 'work_title' => 'Venus and Adonis', 'work_long_title' => 'Venus and Adonis', 'work_year' => 1593, 'work_genre' => 'Poem'],
            ['work_id' => 'winterstale', 'work_title' => "Winter's Tale", 'work_long_title' => "The Winter's Tale", 'work_year' => 1610, 'work_genre' => 'Comedy'],
        ]);
    }
}

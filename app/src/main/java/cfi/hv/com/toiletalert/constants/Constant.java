package cfi.hv.com.toiletalert.constants;

/**
 * Created by Himanshu Kumar Singh
 */
public class Constant{
    public static boolean DEBUG =true;
    public static String BASE_URL = "http://192.168.1.188/adminTest/api/webservices";
    public static String URL_SEARCH = BASE_URL+"/loos.php?operation=fetchall";
    public static String URL_SEARCH_LAT_LOG = BASE_URL+"/loos.php?operation=fetchall";
    public static String ADD_URL = BASE_URL+"/loos.php?operation=insert";
    public static String COMPLAIN = BASE_URL+"/complain.php?operation=insert";



}

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import unittest, time

class Webtest(unittest.TestCase):
    def setUp(self):
        self.options = webdriver.ChromeOptions()
        self.options.add_argument('ignore-certificate-errors')
        #open page
        self._driver = webdriver.Chrome(options=self.options)
    def test_detail(self):
        driver = self._driver
        driver.get("https://localhost/food/login.php")
        driver.implicitly_wait(5)
        driver.maximize_window()

        # login in user mode
        username = driver.find_element(By.ID, "username")
        username.send_keys("yehfela")
        password = driver.find_element(By.ID, "password")
        password.send_keys("pw3068")
        login = driver.find_element(By.XPATH, '//*[@id="form"]/div[4]/a')
        login.click()
        detail = driver.find_element(By.LINK_TEXT, "Edit Details")
        url = detail.get_attribute("href")
        driver.get(url)
        driver.implicitly_wait(5)
        heading = EC.url_contains("details.php")
        self.assertTrue(heading(driver))

    def test_order(self):
        driver = self._driver
        driver.get("https://localhost/food/login.php")
        driver.implicitly_wait(5)
        driver.maximize_window()

        # login in user mode
        username = driver.find_element(By.ID, "username")
        username.send_keys("yehfela")
        password = driver.find_element(By.ID, "password")
        password.send_keys("pw3068")
        login = driver.find_element(By.XPATH, '//*[@id="form"]/div[4]/a')
        login.click()
        js = "document.getElementsByClassName('collapsible-body')[0].style.display='block'"
        driver.execute_script(js)
        order = driver.find_element(By.LINK_TEXT, "All Orders")
        url = order.get_attribute("href")
        driver.get(url)
        driver.implicitly_wait(5)
        heading = EC.url_contains("orders.php")
        self.assertTrue(heading(driver))

    def test_orderfood(self):
        driver = self._driver
        driver.get("https://localhost/food/login.php")
        driver.implicitly_wait(5)
        driver.maximize_window()

        # login in user mode
        username = driver.find_element(By.ID, "username")
        username.send_keys("yehfela")
        password = driver.find_element(By.ID, "password")
        password.send_keys("pw3068")
        login = driver.find_element(By.XPATH, '//*[@id="form"]/div[4]/a')
        login.click()
        detail = driver.find_element(By.LINK_TEXT, "Order Food")
        url = detail.get_attribute("href")
        driver.get(url)
        driver.implicitly_wait(5)
        heading = EC.url_contains("index.php")
        self.assertTrue(heading(driver))

    def test_ticket(self):
        driver = self._driver
        driver.get("https://localhost/food/login.php")
        driver.implicitly_wait(5)
        driver.maximize_window()

        # login in user mode
        username = driver.find_element(By.ID, "username")
        username.send_keys("yehfela")
        password = driver.find_element(By.ID, "password")
        password.send_keys("pw3068")
        login = driver.find_element(By.XPATH, '//*[@id="form"]/div[4]/a')
        login.click()
        js = "document.getElementsByClassName('collapsible-body')[1].style.display='block'"
        driver.execute_script(js)
        driver.execute_script(js)
        order = driver.find_element(By.LINK_TEXT, "All Tickets")
        url = order.get_attribute("href")
        driver.get(url)
        driver.implicitly_wait(5)
        heading = EC.url_contains("tickets.php")
        self.assertTrue(heading(driver))
    def tearDown(self):
        self._driver.quit()


if __name__ == '__main__':
    unittest.main()
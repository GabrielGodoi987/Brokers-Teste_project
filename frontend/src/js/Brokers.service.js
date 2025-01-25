export default class BrokerSerive {
  constructor(url) {
    this.url = url;
    this.route = "brokers";
  }

  async fetchData() {
    try {
      const response = await fetch(`${this.url}/${this.route}`, {
        method: "GET",
      });
      if (!response.ok) {
        throw new Error(`Response Error ${response.status}`);
      }
      const json = await response.json();
      return json.data;
    } catch (error) {
      return error;
    }
  }

  async deleteBroker(id) {}
  async updateBroker(id, content) {}
  async findOneBroker(id) {}
  async findByCreci(creci) {}
}
